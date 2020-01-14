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

use Illuminate\Support\Facades\Auth;

// Dashboard routes
Route::get('/', 'DashboardController@index')->name('dashboard');

// Authentication routes
Auth::routes(['verify' => true]);

// DomainCart routes
Route::get('/domaincart', 'DomainCartController@index')->name('domaincart');

//Admin Test Routes
Route::view('/admin/dashboard', 'admin.dashboard');
Route::view('/admin/products', 'admin.products');
Route::view('/admin/orders', 'admin.orders');
Route::view('/admin/users', 'admin.users');
