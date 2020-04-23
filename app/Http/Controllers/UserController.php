<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

use App\User;
use App\Mail\PasswordMail;

class UserController extends Controller
{
    public function signup(Request $request){
    	$response = [
    		'code' => 200,
    		'message' => 'successful',
    		'ok' => true
    	];

    	try{
            $userData = $request->all();
            $userData['password'] = Hash::make($request->password);

    		User::create($userData);
    	} catch (\Exception $e){
    		$response['ok'] = false;

            switch($e->errorInfo[1]){
                case 1062:
                    if(!empty(User::where('doc', $request->doc)->first())){
                        $response['message'] = 'Este documento ya ha sido registrado';
                        $response['code'] = 1;
                    }else if(!empty(User::where('email', $request->email)->first())){
                        $response['message'] = 'Este correo ya ha sido registrado';
                        $response['code'] = 2;
                    }
                    break;
                default:
                    $response = [
                        'code' => $e->errorInfo[1],
                        'message' => $e->errorInfo[2],
                        'ok' => false
                    ];
                    break;
            }
    	}

    	return response()->json($response);
    }

    public function login(Request $request){
    	$user = User::where('doc', $request->doc)->first();

    	if(!empty($user))
            if(!Hash::check($request->password, $user->password))
                $response = [
                    'ok' => false,
                    'code' => 2,
                    'message' => 'Contraseña incorrecta'
                ];
            else
                $response = [
                    'ok' => true,
                    'code' => 200,
                    'message' => 'successful'
                ];
    	else
    		$response = [
                'ok' => false,
                'code' => 1,
                'message' => 'Documento no registrado'
            ];

    	return response()->json($response);
    }

    public function show($doc){
       return response()->json(User::select('name', 'email')->where('doc', $doc)->first()); 
    }

    public function update(Request $request){
        if($request->password != '')
           $request->merge(['password' => Hash::make($request->password)]); 
        else
            unset($request->password);

        $response = [
            'code' => 200,
            'message' => json_encode($request->all()),
            'ok' => true
        ];

        try{
            $doc = $request->doc;

            unset($request->doc);

            User::where('doc', $doc)->update($request->all());
        } catch (\Exception $e){
            $response = [
                'code' => $e->errorInfo[1],
                'message' => json_encode($request->all()),//$e->errorInfo[2],
                'ok' => false
            ];
        }

        return response()->json($response);
    }

    public function search($text, Request $request){
        $parts = count(explode(' ', $text));

        $excluded_users = json_decode($request->excluded_users);

        if($parts > 1)
            $users = User::select('doc', 'name', 'email')
                    ->whereRaw("MATCH(name) AGAINST('$text*' IN BOOLEAN MODE)")
                    ->whereNotIn('doc', $excluded_users)
                    ->limit(5)
                    ->get();
        else
            $users = User::select('doc', 'name', 'email')
                    ->where('name', 'LIKE', '%' . $text . '%')
                    ->whereNotIn('doc', $excluded_users)
                    ->limit(5)
                    ->get();

        return json_encode($users);
    }

    public function sendCode($doc){
        $code = rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9);

        User::where('doc', $doc)->update(['code' => $code]);

        $data = array(
            'code' => $code
        );

        Mail::to('juanstt99@gmail.com')
            ->send(new PasswordMail($data));

        return response()->json($data);
    }

    public function verifyCode($doc, $code){
        $user = User::select('code')->where('doc', $doc)->first();

        return response()->json($user);
    }
}
