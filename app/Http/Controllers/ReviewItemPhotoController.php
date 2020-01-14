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
            'message' => json_encode($request->items),
            'ok' => true
        ];

        foreach($request->file('photo') as $photo){
            if(!is_null($photo)){
               
            }
        }

    	return response()->json($response);
    }
}
