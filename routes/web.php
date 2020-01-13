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
Route::view('/signup', 'auth/signup');
Route::view('/signin', 'auth/signin');

// Dashboard routes
Route::get('/', 'DashboardController@index')->name('dashboard');

// Authentication routes
Auth::routes(['verify' => true]);

// DomainCart routes
Route::get('/domaincart', 'DomainCartController@index')->name('domaincart');
