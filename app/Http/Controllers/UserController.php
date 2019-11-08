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
    		$user->doc = $request->doc;
    		$user->name = $request->name;
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
    	$user = User::where('doc', $request->doc)->where('password', $request->password)->first();

    	if(!empty($user)){
    		$response = [
                'ok' => true,
                'code' => 200,
                'message' => 'successful'
            ];
    	}else{
    		$response = [
                'ok' => false,
                'code' => 15,
                'message' => 'invalid email or password'
            ];
        }

    	return response()->json($response);
    }

    public function search(Request $request){
        $text = $request->text;
        $parts = count(explode(' ', $text));

        if($parts > 1){
            $users = User::whereRaw("MATCH(name) AGAINST('$text*' IN BOOLEAN MODE)")
                    ->limit(3)
                    ->get();
        }else{
            $users = User::where("name", "LIKE", "%" . $text . "%")
                    ->limit(3)
                    ->get();
        }

        return $users;
    }
}
