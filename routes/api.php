<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('user/signup', 'UserController@signup');
Route::post('user/login', 'UserController@login');
Route::get('user/show/{doc}', 'UserController@show');
Route::post('user/update', 'UserController@update');
Route::get('user/search/{text}', 'UserController@search');

Route::get('project/view/{id}', 'ProjectController@show');
Route::get('project/all', 'ProjectController@showAll');
Route::post('project/store', 'ProjectController@store');
Route::post('project/delete', 'ProjectController@delete');

Route::get('review/categories', 'ReviewCategoryController@showAll');
Route::post('review/store', 'ReviewController@store');
Route::post('review/items/records/{id}/photos', 'ReviewItemPhotoController@store');