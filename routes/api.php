<?php

use Illuminate\Http\Request;

Route::post('user/signup', 'UserController@signup');
Route::post('user/login', 'UserController@login');
Route::get('user/show/{doc}', 'UserController@show');
Route::post('user/update', 'UserController@update');
Route::get('user/search/{text}', 'UserController@search');
Route::get('user/sendResetPassMail/{doc}', 'UserController@sendCode');
Route::get('user/verifyResetPassword', 'UserController@verifyCode');

Route::get('project/view/{id}', 'ProjectController@show');
Route::get('project/all', 'ProjectController@showAll');
Route::post('project/store', 'ProjectController@store');
Route::post('project/delete', 'ProjectController@delete');
Route::post('project/share/update', 'ProjectController@share_update');

Route::get('review/categories', 'ReviewCategoryController@showAll');
Route::get('review/show/project/{id}', 'ReviewController@showByProject');
Route::post('review/store', 'ReviewController@store');
Route::post('review/items/records/photos/store', 'ReviewItemPhotoController@store');
Route::get('review/items/records/photos/show/{id}', 'ReviewItemPhotoController@show');
Route::get('review/items/records/show/{id}', 'ReviewItemRecordController@showByReview');
Route::post('review/delete/{id}', 'ReviewController@delete');

Route::get('review/report', 'ReviewController@downloadReport')->name('report.pdf');