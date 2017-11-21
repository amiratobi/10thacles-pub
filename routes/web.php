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


// guest routes ============================
Route::get('login', 'AuthController@showLoginForm');
Route::post('login', 'AuthController@login');
Route::get('logout', 'AuthController@logout');

// protected routes ============================
Route::middleware('hasToken')->group(function () {
    // dashboard routes
    Route::get('/', 'DashboardController@index')->name('home');
    Route::get('dashboard', 'DashboardController@index');
    // Route::get('dashboard/{range}', 'DashboardController@displayRange');

    // payment routes
    Route::get('payment/rrr/{id?}', 'PaymentController@generateRRR')->name('payment.rrr');
    Route::get('payment', 'PaymentController@index')->name('payment.index');

    // user routes
    Route::get('user', 'UserController@index')->name('user.index');
    Route::post('user', 'UserController@store')->name('user.store'); 
    Route::get('user/add', 'UserController@create')->name('user.create');
    
    // collections routes
    Route::get('payitems', 'PayitemController@index')->name('payitem.index');
    
});
