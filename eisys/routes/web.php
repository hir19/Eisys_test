<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::namespace('Shop')->name('shop.')->group(function() {
    Route::get('/', 'ShopController@index')->name('index');
    Route::get('/detail/{product_id}', 'ShopController@detail')->name('detail');
    Route::middleware('auth')->name('cart.')->group(function() {
        Route::get('/cart', 'CartController@index')->name('index');
        Route::post('/cart', 'CartController@add')->name('add');
        Route::put('/cart/{cart_id}', 'CartController@change')->name('change');
        Route::delete('/cart/{cart_id}', 'CartController@remove')->name('remove');
    });
});

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function() {
    // Route::get('home', 'HomeController@index')->name('home');
    // Route::get('home', 'HomeController@test')->name('test');

    Route::namespace('Auth')->group(function() {
        Route::get('login', 'LoginController@showLoginForm')->name('login');
        Route::post('login', 'LoginController@login');
        Route::post('logout', 'LoginController@logout')->name('logout');
    });


    Route::middleware('auth:admin')->namespace('Product')->name('product.')->group(function() {
        Route::get('/home', 'ProductController@index')->name('index');
        Route::get('/product/edit/{product_id}', 'ProductController@edit')->name('edit');
        Route::put('/product/update/{product_id}', 'ProductController@update')->name('update');
        Route::get('/product/create', 'ProductController@create')->name('create');
        Route::post('/product/store', 'ProductController@store')->name('store');

        Route::get('/product/image/edit/{product_id}', 'ProductController@EditImg')->name('editImg');
        Route::put('/product/image/update/{product_id}', 'ProductController@UpdateImg')->name('updateImg');
        Route::delete('/product/image/delete/{product_id}', 'ProductController@DeleteImg')->name('deleteImg');
    });

    Route::middleware('auth:admin')->namespace('Order')->name('order.')->group(function() {
        Route::get('/order', 'OrderController@index')->name('index');
    });

    Route::middleware('auth:admin')->namespace('User')->name('user.')->group(function() {
        Route::get('/user', 'UserController@index')->name('index');
    });

});
