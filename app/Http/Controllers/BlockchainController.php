<?php

namespace App\Http\Controllers;

use App\Models\Submission;


class BlockchainController extends Controller
{
    
    public function nftData($nft){


        $submission = Submission::find($nft);
        if(!$submission) abort(404);

        $metadata = [
            'name' => $submission->name,
            'description' => $submission->description,
            'external_url' => env('APP_URL') . '/nft/' . $submission->id,
            'image' => env('APP_URL') . '/' . $submission->file,
        ];

        return $metadata;

    }
    

}
