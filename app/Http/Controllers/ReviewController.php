<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;

class ReviewController extends Controller
{
    public function store(){
    	$response = [
            'code' => 200,
            'message' => 'successful',
            'ok' => true
        ];

        try{
    		//Review::create([]);
    	} catch (\Exception $e){

    	}
        
    	return response()->json($response);
    }
}
