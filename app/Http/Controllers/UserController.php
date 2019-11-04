<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function signup($email, $password){
    	return response()->json([
    		'code' => 200,
    		'message' => 'successful',
    		'ok' => true
    	]);
    }

    public function login($email, $password){
    	return response()->json([
    		'email' => 'hola'
    	]);
    }
}
