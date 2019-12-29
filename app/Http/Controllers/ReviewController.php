<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;

class ReviewController extends Controller
{
	public function showByProject($id){
        $reviews = Review::where('project_id', $id)->with('creator_user')->orderBy('created_at')->get();

        foreach($reviews as $review){
            $review->created_ago = $review->created_at->diffForHumans();
        }

		return response()->json($reviews);
	}

    public function store(Request $request){
    	$response = [
            'code' => 200,
            'message' => 'successful',
            'ok' => true
        ];

        try{
    		Review::create([
    			'creator_doc' => $request->creator_user['doc'],
    			'project_id' => $request->project['id']
    		]);
    	} catch (Exception $e){
    		$response = [
                'code' => 4,//$e->errorInfo[1],
                'message' => json_encode($e),//$e->errorInfo[2],
                'ok' => false
            ];
    	}
        
    	return response()->json($response);
    }
}
