<?php

namespace App;

class Helper {

    public static function formatAddress($address){

        return substr($address, 0, 4) . '...' . substr($address, -4);
        
    }

}