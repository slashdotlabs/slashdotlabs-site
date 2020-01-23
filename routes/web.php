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

/**
 * Common routes
 */
Route::redirect('/home', wordpress_url('/'));
Auth::routes();
Route::get('/domaincart', 'DomainCartController@index')->name('domaincart');


/**
 * Customer only routes
 */
Route::middleware(['auth.customer'])->group(function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');
    // Customer update routes
    Route::patch('/user', 'UsersController@update')->name('user.update');
    Route::patch('/user/password', 'UsersController@changePassword')->name('user.changepassword');

    //Nameserver resource
    Route::resource('nameservers', 'NameserversController')->only('store');

    Route::get('/domaincart/order_checkout', 'DomainCartController@order_checkout')->name('domaincart.order_checkout');
});

Route::get('/destroycart', function () {
    session_start();
    session_destroy();
    return redirect('/domaincart')->with('success', session('sucess'));
});
//Payment routes
Route::get('/payment/process', 'PaymentsController@create');

/**
 * Admin Routes only
 */
Route::middleware(['auth.staff'])->group(function () {
    //Admin Dashboard Route
    Route::view('/admin/dashboard', 'admin.dashboard');

    //Admin Products Resource Route
    Route::resource('admin/products', 'ProductsController');
    Route::put('admin/products/suspend/{id}', 'ProductsController@suspend')->name('products.suspend');

    //Admin Orders Resource Route
    Route::resource('admin/orders', 'OrdersController');

    //Admin Users Resource Route
    Route::resource('admin/users', 'UsersController');
});

