<?php

namespace App\Http\Controllers;
use App\Models\Submission;
use App\Models\Transaction;
use App\Models\Bid;

use Illuminate\Http\Request;

class AuctionController extends Controller{

    public function auction(){
        
        $submission = Submission::where('in_auction', 1)->first();
        
        $previous_auctions = Submission::where(['auctioned' => 1])->get();

        return view('auction', compact('submission', 'previous_auctions'));
    }
    
    public function setupAuction(){
        if(\Auth::user()->admin != 1) abort(404);
        $submissions = Submission::where('auctioned', 0)->orderBy('auctioning_at')->get();
        return view('setup-auction', compact('submissions'));
    }

    public function bids(){
        $current_submission = Submission::where('in_auction', 1)->first();
        if(!$current_submission){
            return response()->json(['result' => 'error, no submission in auction']);    
        }
        return $current_submission->bids()->orderBy('created_at', 'desc')->get();
    }

    // this function receives a transaction_id and stores it on the database
    // and it triggers the sync job that will check all transactions and sync bids
    public function placeBid($tx){
        

        for($i = 0; $i < 5; $i++){

            $tx_details = file_get_contents(env('SCAN_API_URL')  . '?module=proxy&action=eth_getTransactionByHash&txhash=' . $tx . '&apikey=' . env('SCAN_TOKEN'));
            
            \Log::debug($tx_details);

            // empty json, api down?
            if(empty($tx_details)){
                $transaction->status = -1;
                $transaction->scan_result = 'empty json returned';
                $transaction->save();
                break;
            }
            
            $tx_details_obj = json_decode($tx_details);

            // non existent or pending
            if(!$tx_details_obj->result){
                // $transaction->status = 0;
                // $transaction->scan_result = 'non existent';
                // $transaction->save();
            }

            // only work with transactions to the circadian contract
            if($tx_details_obj->result && strtolower($tx_details_obj->result->to) != strtolower(env('CONTRACT_ADDRESS'))){
                break;
            }

            // transaction successful, save transaction and bid on db
            if($tx_details_obj->result && $tx_details_obj->result->value){

                $transaction = Transaction::where('tx', $tx)->first();
                if(!$transaction) $transaction = new Transaction;
                $transaction->tx = $tx;
                $transaction->status = 1;
                $transaction->scan_result = $tx_details;
                $transaction->save();

                $bid = Bid::where('tx', $tx)->first();

                if(!$bid){
                    
                    $current_auctioned_submission = Submission::where('in_auction', 1)->first();
                    
                    $bid = new Bid;
                    $bid->tx = $tx;
                    // value arrives in wei
                    $value = hexdec($tx_details_obj->result->value) / 1000000000000000000;
                    $bid->value = str_replace('0x', '', $value);
                    $bid->submission_id = $current_auctioned_submission->id;
                    $bid->address = $tx_details_obj->result->from;
                    $bid->save();

                    // if there is no winningbid yet or if the new bid is higher than the existing winningbid, make this one the winningbid
                    if(!$current_auctioned_submission->winning_bid || $bid->value > $current_auctioned_submission->winningBid->value){
                        $current_auctioned_submission->winning_bid = $bid->id;
                        $current_auctioned_submission->save();
                    }

                }

                break;
            }


            sleep(1);

        }

        dd($tx_details);

    }

    // this function receives a transaction id and checks etherscan or bscscan to see if the bid was placed correctly
    // on the blockchain, if yes, it saves it also into the database for quick queriying after
    public function oldPlaceBid($tx){
        
        // $tx_details = file_get_contents(env('SCAN_API_URL')  . '?module=proxy&action=eth_getTransactionByHash&txhash=' . $tx . '&apikey=' . env('SCAN_TOKEN'));
        $tx_details = file_get_contents(env('SCAN_API_URL')  . '?module=proxy&action=eth_getTransactionByHash&txhash=' . $tx . '&apikey=' . env('SCAN_TOKEN'));
        if(empty($tx_details)){

            return response()->json(['result' => 'error, invalid transaction']);    

        }

        Blockchain::sync();

        \Log::debug($tx_details);

        $transaction = json_decode($tx_details);

        // the transaction has been made, but is not yet confirmed on the blockchain
        if(empty($transaction->result)){

            // start the blockchain polling
            Blockchain::sync();

            return response()->json(['result' => 'not_confirmed']);

        }
        
        // value arrives in wei
        $value = hexdec($transaction->result->value) / 1000000000000000000;
        
        if($transaction->result->to != strtolower(env('CONTRACT_ADDRESS'))){
            return response()->json(['result' => 'error, wrong transaction']);    
        }

        $current_submission = Submission::where('in_auction', 1)->first();
        if(!$current_submission){
            return response()->json(['result' => 'error, no submission in auction']);    
        }

        $highest_bid = Bid::latest('created_at')->first();

        if($highest_bid && $highest_bid->value >= $value){
            return response()->json(['result' => 'error, there is already a higher bid']);    
        }
    
        
        $bid = new Bid;
        $bid->address = $transaction->result->from;
        $bid->submission_id = $current_submission->id;
        $bid->value = str_replace('0x', '', $value);
        $bid->save();

        return response()->json(['result' => 'success']);

        echo $tx_details;

    }

}
