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

    Route::group(['middleware' => ['auth']], function () {
        Route::get('dashboard',['as'=>'dashboard','uses'=>'DashboardController@index']);
        Route::get('logout',['as'=>'logout','uses'=>'UserController@logout']);
        Route::get('change-password',['as'=>'change.password','uses'=>'UserController@changePassword']);
        Route::post('update-change-password',['as'=>'update.change.password','uses'=>'UserController@updateChangePassword']);


        Route::group(['middleware' => ['superadmin']], function () {
            Route::get('register-list',['as'=>'get.venderlist','uses'=>'AdminController@registerList']);
            Route::get('get/registerlist/{id?}',['as'=>'get.registerdetail','uses'=>'AdminController@getRegisterDetail']);
            Route::post('approve',['as'=>'check.approve','uses'=>'AdminController@checkIsApprove']);
            Route::get('get/approvelist',['as'=>'get.approvelist','uses'=>'AdminController@getApprovelist']);

        });
        Route::group(['middleware' => ['seller']], function () {
            //Route::resource('products', 'ProductController');
            Route::get('products',['as' => 'get.products','uses'=>'ProductController@create']);
            Route::post('product/store',['as' => 'product.store','uses'=>'ProductController@store']);
            Route::get('product/sub-category',['as' => 'product.get-subcategory','uses'=>'ProductController@productSubcategory']);
            Route::get('product/detail-list',['as'=>'get.product-list','uses'=>'ProductController@productDetails']);
           Route::get('product/showSubcategory-list',['as'=>'get.subcategory-list','uses'=>'ProductController@showSubcategoryList']);
            Route::get('product/manage-image',['as'=>'product.manage-image','uses'=>'ProductController@manageImage']);


            Route::get('product/detail-list',['as'=>'get.product-list','uses'=>'ProductController@productDetails']);

            Route::get('product/detail-list',['as'=>'get.product-list','uses'=>'ProductController@productDetils']);

            Route::get('product/manage-image/{id?}',['as'=>'product.manage-image','uses'=>'ProductController@manageImage']);
            Route::post('product/upload-image',['as'=>'product.upload-image','uses'=>'ProductController@uploadImage']);
            Route::get('product/main-image/{id?}',['as'=>'product.main-image','uses'=>'ProductController@updateMainImage']);


        });
    });

});




