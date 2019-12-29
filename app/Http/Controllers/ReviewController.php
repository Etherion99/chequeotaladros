<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\ReviewItemRecord;

class ReviewController extends Controller
{
	public function showByProject($id){
        $reviews = Review::where('project_id', $id)->with('creator_user')->orderBy('created_at', 'desc')->get();

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
    		$review = Review::create([
    			'creator_doc' => $request->creator_user['doc'],
    			'project_id' => $request->project['id']
    		]);

            foreach($request->items_records as $categoryRecord){
                foreach($categoryRecord['items'] as $itemRecod){
                    ReviewItemRecord::create([
                        'review_id' => $review->id,
                        'item_id' => $itemRecod['item_id'],
                        'comment' => ''//$itemRecod['comment']
                    ]);
                }                
            }
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
