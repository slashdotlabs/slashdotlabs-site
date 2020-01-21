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
use Illuminate\Support\Facades\Route;

// Dashboard routes
Route::get('/', 'DashboardController@index')->name('dashboard');

// Customer update routes
Route::patch('/user', 'UsersController@update')->name('user.update');
Route::patch('/user/password', 'UsersController@changePassword')->name('user.changepassword');

Route::redirect('/home', wordpress_url('/'));

// Authentication routes
Auth::routes(['verify' => true]);

// DomainCart routes
Route::get('/domaincart', 'DomainCartController@index')->name('domaincart');
Route::get('/domaincart/order_checkout', 'DomainCartController@order_checkout')->name('domaincart.order_checkout');

Route::get('/destroycart', function(){
    session_start();
    session_destroy();
    return redirect('/domaincart');
});

//Payment routes
Route::get('/payment/process', 'PaymentsController@create');

//OrderController routes
Route::resource('orders', 'OrdersController')->only(['index']);

//Admin Dashboard Route
Route::view('/admin/dashboard', 'admin.dashboard');

//Admin Products Resource Route
Route::resource('admin/products', 'ProductsController');

//Admin Orders Resource Route
Route::resource('admin/orders', 'OrdersController');

//Admin Users Resource Route
Route::resource('admin/users', 'UsersController');


//Nameserver resource
Route::resource('nameservers', 'NameserversController')->only('store');
