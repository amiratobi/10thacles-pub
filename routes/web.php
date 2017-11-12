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

<<<<<<< HEAD
Route::get('/', 'DashboardController@index');
Route::get('login', 'LoginController@index');
Route::get('dashboard', 'DashboardController@index');
Route::get('dashboard/{range}', 'DashboardController@displayRange');
Route::get('users', 'UserController@index');
Route::get('users/add', 'UserController@create');
Route::get('payments', 'PaymentController@index');
Route::get('payments/all', 'PaymentController@genAllRRR');
Route::get('payments/{index}', 'PaymentController@genSingleRRR');


=======

// guest routes ============================
Route::get('login', 'AuthController@showLoginForm');
Route::post('login', 'AuthController@login');
Route::get('logout', 'AuthController@logout');

// protected routes ============================
Route::middleware('hasToken')->group(function () {
    Route::get('/', 'DashboardController@index');
    Route::get('dashboard', 'DashboardController@index');
    Route::get('dashboard/{range}', 'DashboardController@displayRange');
    Route::get('users', 'UserController@index');
});
>>>>>>> 8eb1898c499567cd860cb48cf71bbe8bc732839e
