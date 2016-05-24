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



    Route::get('register',['as'=>'seller.register','uses'=>'UserController@register']);
    Route::post('register',['as'=>'seller.store','uses'=>'UserController@store']);


    Route::get('login',['as'=>'login', 'uses'=>'UserController@login']);
    Route::post('login',['as'=>'admin.login','uses'=>'UserController@addLogin']);
    Route::get('dashboard',['as'=>'admin.index','uses'=>'DashboardController@index']);
    Route::get('logout',['as'=>'admin.logout','uses'=>'UserController@logout']);
});


/*Route::group(['middleware' => [Auth']], function()
{*/


