<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
{
    public function signup(Request $request){
    	$response = [
    		'code' => 200,
    		'message' => 'successful',
    		'ok' => true
    	];

    	try{
    		$user = new User;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->save();
    	} catch (Illuminate\Database\QueryException $e){
    		$errorCode = $e->errorInfo[1];

            if($errorCode == 1062){
                $response = [
                    'ok' => false,
                    'code' => $errorCode
                ];
            }
    	}

    	return response()->json($response);
    }

    public function login($email, $password){
    	return response()->json([
    		'email' => 'hola'
    	]);
    }
}
