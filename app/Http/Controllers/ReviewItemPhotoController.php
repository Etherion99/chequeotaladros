<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewItemPhotoController extends Controller
{
    public function showByItem(){

    }

    public function store($review, Request $request){
    	/*if($response['ok'] && !is_null($request->file('photo'))){
    		$photo = $request->file('photo');
	        $name = $user->id.'.'.$photo->getClientOriginalExtension();
	        $path = public_path('/images/profiles');

	        if(!$photo->move($path, $name)){
	        	$response['message'] = "Error al guardar imagen";
	        }
    	}*/

    	$response = [
            'code' => $review,
            'message' => json_encode($request->all()),
            'ok' => true
        ];

    	return response()->json($response);
    }
}
