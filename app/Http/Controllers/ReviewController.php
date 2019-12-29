<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;

class ReviewController extends Controller
{
    public function store(Request $request){
    	$response = [
            'code' => 200,
            'message' => 'successful',
            'ok' => true
        ];

        try{
    		Review::create([
    			'creator' => $request->creator,
    			'project_id' => $request->project->id
    		]);
    	} catch (\Exception $e){
    		$response = [
                'code' => 4,//$e->errorInfo[1],
                'message' => 'gg',//$e->errorInfo[2],
                'ok' => false
            ];
    	}
        
    	return response()->json($response);
    }
}
