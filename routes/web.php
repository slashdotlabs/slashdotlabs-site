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
Route::patch('/user/{id}', 'DashboardController@update')->name('user.update');
Route::patch('/password/{id}', 'DashboardController@changePassword')->name('user.changepassword');
Route::patch('/bio/{id}', 'DashboardController@changeBio')->name('user.changeinfo');

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

//Admin Test Routes
Route::view('/admin/dashboard', 'admin.dashboard');
Route::view('/admin/products', 'admin.products');
Route::view('/admin/orders', 'admin.orders');
Route::view('/admin/users', 'admin.users');

//Products Resource Route
Route::resource('products', 'ProductsController');

//Orders Resource Route
Route::resource('orders', 'OrdersController');

//Users Resource Route
Route::resource('users', 'UsersController');
