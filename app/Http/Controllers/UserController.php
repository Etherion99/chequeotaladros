<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function signup($email, $password){
    	return response()->json([
    		'email' => 'hola'
    	]);
    }

    public function login($email, $password){
    	return response()->json([
    		'email' => 'hola'
    	]);
    }
}
