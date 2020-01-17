<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReviewItemPhoto;
use App\ReviewItemRecord;
use Illuminate\Support\Facades\Storage;


class ReviewItemPhotoController extends Controller
{
    public function show($id){
        $photo = ReviewItemPhoto::find($id)->first();

        if(isset($photo)){
            $path = storage_path().'/images/reviews/records/'.$photo->review_item_record.'/'.$photo->id.'.'.$photo->extension;
        }else{
            $path = storage_path().'/assets/images/not_found.jpg';
        } 

        return response()->json($path);  
    }

    public function store(Request $request){
    	$response = [
            'code' => 4,
            'message' => json_encode($request->review),
            'ok' => true
        ];

        try{
            foreach($request->file('photo') as $photo){
                if(!is_null($photo)){
                    $response['code'] = 88;
                    $record = ReviewItemRecord::where('review_id', $request->review)
                        ->where('item_id', $request->item)
                        ->first();

                    $recordPhoto = ReviewItemPhoto::create([
                        'review_item_record' => $record->id,
                        'extension' => $photo->getClientOriginalExtension(),
                    ]);

                    if(!$photo->storeAs('/images/reviews/records/'.$record->id, $recordPhoto->id.'.'.$recordPhoto->extension)){
                        $response['code'] = 108;
                        $response['message'] = "Error al guardar imagen";
                    }
                }
            }
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
