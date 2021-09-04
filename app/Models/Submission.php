<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class Submission extends Model
{
    
    use HasFactory;

    protected $dates = ['auctioning_at'];

    public function bids(){
        return $this->hasMany(Bid::class);
    }

    public function winningBid(){
        return $this->belongsTo(Bid::class, 'winning_bid');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }



    // helpers

    public function getBids(){
        return $this->bids()->orderBy('created_at', 'desc')->get();
    }


    public function getHighestBid(){
        return $this->bids()->orderBy('value', 'desc')->first();
    }

}
