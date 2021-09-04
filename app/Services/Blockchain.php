<?php

namespace App\Services;
use Web3\Web3;
use Web3\Contract;
use Web3\Providers\HttpProvider;
use Web3\RequestManagers\HttpRequestManager;

class Blockchain {

    // polls the blockchain and syncs bids
    public static function sync(){

        $abi = file_get_contents('../resources/js/abi.js');
        $contract = new Contract( new HttpProvider(new HttpRequestManager('https://data-seed-prebsc-1-s1.binance.org:8545', 50)) , $abi);
        
        $contract->at(env('CONTRACT_ADDRESS'))->call('bids', null, function($err, $data){
            dd($data);
        });
        
    }

}