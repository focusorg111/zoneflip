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





Route::group(['middleware' => ['web']], function () {

    Route::get('login',['as'=>'login', 'uses'=>'UserController@login']);
    Route::post('login',['as'=>'admin.login','uses'=>'UserController@addLogin']);



    Route::get('/autocomplete',['as'=>'get.autocomplete','uses'=>'ProductController@autocomplete']);


    Route::get('register',['as'=>'register.view','uses'=>'UserController@registerView']);
    Route::get('seller/register',['as'=>'seller.register','uses'=>'UserController@register']);
    Route::post('seller/register',['as'=>'seller.store','uses'=>'UserController@store']);
    Route::get('email',['as'=>'verify.email','uses'=>'UserController@verifyEmail']);
    Route::get('/',['as'=>'index','uses'=> 'ProductController@index']);
    Route::get('productsllist/{id?}',['as'=>'product.list','uses'=> 'ProductController@productList']);
    Route::get('product/detail/{id?}',['as'=>'product.quickdetail','uses'=>'ProductController@quickView']);

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

            Route::get('products',['as' => 'get.products','uses'=>'ProductController@create']);
            Route::post('product/store',['as' => 'product.store','uses'=>'ProductController@store']);
            Route::get('products/edit/{id}',['as' => 'get.products-edit','uses'=>'ProductController@edit']);
            Route::put('products/update',['as' => 'product.update','uses'=>'ProductController@update']);
            Route::get('product/sub-category',['as' => 'product.get-subcategory','uses'=>'ProductController@productSubcategory']);
            Route::get('product/detail-list',['as'=>'get.product-list','uses'=>'ProductController@productDetails']);
            Route::get('product/showSubcategory-list',['as'=>'get.subcategory-list','uses'=>'ProductController@showSubcategoryList']);
            Route::get('product/manage-image/{id?}',['as'=>'product.manage-image','uses'=>'ProductController@manageImage']);
            Route::post('product/upload-image',['as'=>'product.upload-image','uses'=>'ProductController@uploadImage']);
            Route::get('product/main-image',['as'=>'product.main-image','uses'=>'ProductController@updateMainImage']);



        });
    });

});



