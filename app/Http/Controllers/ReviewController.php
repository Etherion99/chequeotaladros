<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(){
    	$response = [
            'code' => 200,
            'message' => 'successful',
            'ok' => true
        ];

        
        
    	return response()->json($response);
    }
}
