<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\ReviewItemRecord;
use App\OperatingCondition;
use App\ReviewCategory;
use App\ReviewItem;
use App\ReviewItemPhoto;

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
            'message' => 'successful', 
            'ok' => true
        ];

        try{
    		$review = Review::updateOrCreate(
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
                            'id' => $itemRecod['id']
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
                                'id' => $operatingCondition['id']
                            ],
                            [
                                'type' => $operatingCondition['type'],
                                'value' => $operatingCondition['value'],
                                'record_id'  => $record->id
                            ]
                        );
                    }                    
                }                
            }

            $response['extra'] = json_encode($review);
    	} catch (Exception $e){
    		$response = [
                'code' => $e->errorInfo[1],
                'message' => $e->errorInfo[2],
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

    public function records($id){
        $categories = ReviewCategory::with('items')->get(); 

        $categoryRecords = array();

        foreach($categories as $category){
            $items = array();

            foreach($category['items'] as $item){
                $record = ReviewItemRecord::where('review_id', $id)
                    ->where('item_id', $item['id'])
                    ->with('operating_conditions')
                    ->first();

                if(isset($record))
                    $photos = ReviewItemPhoto::where('review_item_record', $record->id)->get();

                    foreach($photos as $photo){
                        $photo->type = 'internet';
                    }

                    $record->photos = $photos;


                $item->record = $record;

                array_push($items, $item);
            }

            array_push($categoryRecords, array(
                'id' => $category['id'],
                'name' => $category['name'],
                'items' => $items
            ));
        }

        return $categoryRecords; 
    }

    public function report($id){
        $data = $this->records($id);

        return response()->view('report')->with('data', $data);
    }

    public function downloadReport($id){
        $data = $this->records($id);

        $pdf = \PDF::loadView('report', $data);

        $pdf->save(storage_path().'_filename.pdf');

        return $pdf->download('customers.pdf'); 
    }
}
