<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('user/signup', 'UserController@signup');
Route::post('user/login', 'UserController@login');
Route::post('user/search/{text}', 'UserController@search');
Route::get('project/all', 'ProjectController@getAll');
Route::post('project/store', 'ProjectController@store');