<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Exception;

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
    	} catch (\Exception $e){
    		$response = [
                'ok' => false,
                'code' => $e->errorInfo[1],
                'message' => 'duplicate email error'
            ];
    	}

    	return response()->json($response);
    }

    public function login($email, $password){
    	return response()->json([
    		'email' => 'hola'
    	]);
    }
}
