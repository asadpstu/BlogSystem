<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/blog', 'BlogController@index');
Route::post('/blog/post', 'BlogController@store');
Route::get('/blog/post/{id}', 'BlogController@show');
Route::post('/blog/post/update', 'BlogController@update');
Route::get('/blog/details/{id}/{bloggerId}', 'HomeController@show');
//Follow/Unfollow Sales Person
Route::post('/salesperson/follow', 'HomeController@follow');
Route::post('/salesperson/unfollow', 'HomeController@unfollow');