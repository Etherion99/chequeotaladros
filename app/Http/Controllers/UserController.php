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
    	$user = User::where('doc', $request->doc)->first();

    	if(!empty($user)){
            if(!Hash::check($request->password, $user->password)){
                $response = [
                    'ok' => false,
                    'code' => 2,
                    'message' => 'Contraseña incorrecta'
                ];
            }else{
                $response = [
                    'ok' => true,
                    'code' => 200,
                    'message' => 'successful'
                ];
            }
    	}else{
    		$response = [
                'ok' => false,
                'code' => 1,
                'message' => 'Documento no registrado'
            ];
        }

    	return response()->json($response);
    }

    public function search($text){
        $parts = count(explode(' ', $text));

        if($parts > 1){
            $users = User::select("doc", "name")
                    ->whereRaw("MATCH(name) AGAINST('$text*' IN BOOLEAN MODE)")
                    ->limit(3)
                    ->get();
        }else{
            $users = User::select("doc", "name")
                    ->where("name", "LIKE", "%" . $text . "%")
                    ->limit(3)
                    ->get();
        }

        return $users;
    }
}
