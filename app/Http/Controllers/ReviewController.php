<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\ReviewItemRecord;
use App\OperatingCondition;

class ReviewController extends Controller
{
	public function showByProject($id){
        $reviews = Review::where('project_id', $id)->with(['creator_user', 'project'])->orderBy('created_at', 'desc')->get();

        foreach($reviews as $review){
            $review->created_ago = $review->created_at->diffForHumans();
        }

		return response()->json($reviews);
	}

    public function store(Request $request){
    	$response = [
            'code' => 200,
            'message' => json_encode($request->all()),//'successful',
            'ok' => true
        ];

        try{
    		/*$review = Review::updateOrCreate(
                [
                    'id' => $request->id
                ],
                [
                    'creator_doc' => $request->creator_user['doc'],
                    'project_id' => $request->project['id']
                ]
            );

            foreach($request->items_records as $categoryRecord){
                foreach($categoryRecord['items'] as $itemRecod){
                    $record = ReviewItemRecord::updateOrCreate(
                        [
                            'id' => $itemRecod->id
                        ],
                        [
                            'review_id' => $review->id,
                            'item_id' => $itemRecod['item_id'],
                            'comment' => $itemRecod['comment']
                        ]
                    );

                    foreach($itemRecod['operating_conditions'] as $operatingCondition){
                        OperatingCondition::updateOrCreate(
                            [
                                'id' => $operatingCondition->id
                            ],
                            [
                                'type' => $operatingCondition['type'],
                                'value' => $operatingCondition['value'],
                                'record_id'  => $record->id
                            ]
                        );
                    }                    
                }                
            }*/
    	} catch (Exception $e){
    		$response = [
                'code' => 4,//$e->errorInfo[1],
                'message' => json_encode($e),//$e->errorInfo[2],
                'ok' => false
            ];
    	}
        
    	return response()->json($response);
    }

    /*public function update(Request $request){
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
                    $record = ReviewItemRecord::create([
                        'review_id' => $review->id,
                        'item_id' => $itemRecod['item_id'],
                        'comment' => $itemRecod['comment']
                    ]);

                    foreach($itemRecod['operating_conditions'] as $operatingCondition){
                        OperatingCondition::create([
                            'type' => $operatingCondition['type'],
                            'value' => $operatingCondition['value'],
                            'record_id'  => $record->id
                        ]);
                    }                    
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
    }*/

    public function delete($id){
        $response = [
            'code' => 200,
            'message' => 'successful',
            'ok' => true
        ];

        try{
            Review::find($id)->delete();
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
