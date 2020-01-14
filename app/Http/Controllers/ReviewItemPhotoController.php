<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewItemPhotoController extends Controller
{
    public function showByItem(){

    }

    public function store(Request $request){
    	/*if($response['ok'] && !is_null($request->file('photo'))){
    		$photo = $request->file('photo');
	        $name = $user->id.'.'.$photo->getClientOriginalExtension();
	        $path = public_path('/images/profiles');

	        if(!$photo->move($path, $name)){
	        	$response['message'] = "Error al guardar imagen";
	        }
    	}*/

    	$response = [
            'code' => 4,
            'message' => json_encode($request->photo),
            'ok' => true
        ];

        $m = "hola ";

        foreach($request->file('photo') as $photo){
            if(!is_null($photo)){
                $m .= $photo->getClientOriginalExtension()."*  *";
            }
        }

        $response['message'] = $m;

    	return response()->json($response);
    }
}
