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

//Here In this api if we want to add prefix of api url,we can do that easily by using "Route Group"
Route::middleware('auth:api')->post('/user/follower','Api\CustomApiController@followerList');
Route::middleware('auth:api')->post('/user/common-follower','Api\CustomApiController@CommonFollower');
Route::middleware('auth:api')->post('/user/author/block','Api\CustomApiController@block');
Route::middleware('auth:api')->post('/user/author/unread','Api\CustomApiController@unread');