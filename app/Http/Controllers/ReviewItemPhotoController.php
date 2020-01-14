<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReviewItemPhoto;

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

        try{
            $l = "ll ";
            foreach($request->file('photos') as $photo){
                $l .= $photo->getClientOriginalName();
                if(!is_null($photo)){
                    $response['code'] = 88;
                    $record = ReviewItemRecord::where('review_id', $request->review)
                        ->where('item_id', $request->item)
                        ->get();

                    $recordPhoto = ReviewItemPhoto::create([
                        'review_item_record' => $record->id,
                        'extension' => $photo->getClientOriginalExtension(),
                    ]);

                    if(!$photo->storeAs('/images/reviews/records/'.$record->id, $recordPhoto->id.$recordPhoto->extension)){
                        $response['code'] = 108;
                        $response['message'] = "Error al guardar imagen";
                    }
                }
            }

            $response['message'] = json_encode($request->all());
        } catch (Exception $e){
            $response = [
                'code' => $e->errorInfo[1],
                'message' => $e->errorInfo[2],
                'ok' => false
            ];
        }

    	return response()->json($response);
    }
}
