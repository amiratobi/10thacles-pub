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

Route::get('/', 'DashboardController@index');
Route::get('login', 'LoginController@index');
Route::get('dashboard', 'DashboardController@index');
Route::get('dashboard/{range}', 'DashboardController@displayRange');
Route::get('users', 'UserController@index');
Route::get('users/add', 'UserController@create');
Route::get('payments', 'PaymentController@index');
Route::get('payments/all', 'PaymentController@genAllRRR');
Route::get('payments/{index}', 'PaymentController@genSingleRRR');


