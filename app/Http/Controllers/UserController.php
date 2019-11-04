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
                'message' => 'duplicate email'
            ];
    	}

    	return response()->json($response);
    }

    public function login(Request $request){
    	$user = User::where('email', $request->email)->where('password', $request->password)->get();

    	if(empty($user)){
    		$response = [
                'ok' => true,
                'code' => 200,
                'message' => 'successful',
                'data' => empty($user)
            ];
    	}else{
    		$response = [
                'ok' => false,
                'code' => 15,
                'message' => 'invalid email or password',
                'data' => var_dump($user)
            ];
        }

    	return response()->json($response);
    }
}
