<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewItemPhotoController extends Controller
{
    public function showByItem(){

    }

    public function store(Request $request){
    	$response = [
            'code' => 4,
            'message' => json_encode($request->review),
            'ok' => true
        ];

        foreach($request->file('photos') as $photo){
            if(!is_null($photo)){
               
            }
        }

    	return response()->json($response);
    }
}
