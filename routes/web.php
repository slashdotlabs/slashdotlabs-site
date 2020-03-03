<?php

use App\Models\OrderItem;
use App\Notifications\ProductExpiringNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/**
 * Common routes
 */
Route::redirect('/home', wordpress_url('/'));

Auth::routes();
Route::get('/domaincart', 'DomainCartController@index')->name('domaincart');

// Customer update routes
Route::patch('/user', 'UsersController@update')->name('user.update');
Route::patch('/user/password', 'UsersController@changePassword')->name('user.changepassword');

/**
 * Customer only routes
 */
Route::middleware(['auth.customer', 'auth.suspended'])->group(function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');
    //Nameserver resource
    Route::resource('nameservers', 'NameserversController')->only('store');
    Route::post('/domaincart/order_checkout', 'DomainCartController@order_checkout')->name('domaincart.order_checkout');
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
Route::middleware(['auth','auth.staff', 'auth.suspended'])->group(function () {
    //Admin Dashboard Route
    Route::get('/admin/dashboard', 'AdminDashboardController@index');
    Route::patch('/admin/user', 'UsersController@update')->name('admin.update');
    Route::patch('/admin/password', 'UsersController@changePassword')->name('admin.changepassword');

    //Admin Products Resource Routes + Suspend and Restore
    Route::resource('admin/products', 'ProductsController');
    Route::put('admin/products/suspend/{id}', 'ProductsController@suspend')->name('products.suspend');
    Route::put('admin/products/restore/{id}', 'ProductsController@restore')->name('products.restore');

    //Admin Orders Resource Route
    Route::resource('admin/orders', 'OrdersController')->only('index');
    Route::post('admin/orders/{order_id}/cancel', 'OrdersController@cancel')->name('orders.cancel');

    // Admin Payments Resource Route
    Route::resource('admin/payments', 'PaymentsController')->only(['index', 'store']);

    //Admin Users Resource Route
    Route::resource('admin/users', 'UsersController');
    Route::put('admin/users/suspend/{id}', 'UsersController@suspend')->name('users.suspend');
    Route::put('admin/users/restore/{id}', 'UsersController@restore')->name('users.restore');

    Route::get('admin/customers', 'CustomersController@index');
});

