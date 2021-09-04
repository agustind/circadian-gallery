<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function dashboard(){
        return view('dashboard');
    }

    public function artwork(){
        $submissions = \Auth::user()->submissions;
        return view('artwork', compact('submissions'));
    }

    public function profile(){
        return view('profile');
    }

}
