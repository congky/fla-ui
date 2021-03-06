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
Route::group(['namespace' => 'FLA\UI\Controllers', 'middleware' => 'web'], function () {
    Route::get('/login', function () {
        return view('flaCommonUI::admin.login.index');
    });

    Route::group(['middleware' => ['verifyUserLogged']], function () {

        Route::get('/', function () {
            return view('flaCommonUI::admin.dashboard.index');
        });

        Route::get('/dashboard', function () {
            return view('flaCommonUI::admin.dashboard.index');
        });

        Route::get('/users', function () {
            return view('flaCommonUI::admin.users.index');
        });

        // ROLE
        Route::get('/role', function () {
            return view('flaCommonUI::admin.role.index');
        });
    });

});