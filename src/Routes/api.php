<?php

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
Route::group(['namespace' => 'FLA\UI\Controllers', 'prefix'=>'api', 'middleware' => 'api'], function () {
    Route::group(['middleware' => 'auth'], function () {
        Route::post('login', 'AuthController@login');
        Route::post('logout', 'AuthController@logout');
    });

    Route::group(['middleware' => 'verifyReq'], function () {
        Route::post('call-service', 'ServiceController@call');
    });
});