<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => ['web']], function () {

    Route::get('login',['as'=>'admin.lodin','uses'=>'UserController@login']);
    Route::get('register',['as'=>'seller.register','uses'=>'UserController@register']);
    Route::post('register',['as'=>'seller.store','uses'=>'UserController@store']);
});