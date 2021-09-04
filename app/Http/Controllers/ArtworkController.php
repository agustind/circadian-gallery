<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submission;

class ArtworkController extends Controller
{
    

    public function myArtwork(){

        $submissions = \Auth::user()->submissions;

        return view('artwork/index', compact('submissions'));

    }

    public function submit(){
        return view('artwork/submit');
    }

    public function uploadFiles(){ 

        $path = request()->file('file')->store('files');
        
        $submission = new Submission;
        $submission->user_id = \Auth::user()->id;
        $submission->file = $path;
        $submission->save();
        
        return response()->json(['result' => 'success', 'submission_id' => $submission->id]);

    }

    public function store(){        
        $submission = Submission::find(request('submission_id'));
        $submission->name = request('name');
        $submission->save();
        
        return redirect('/artwork');
    }

    public function remove(){
        
    }

}
