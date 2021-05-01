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
    Route::get('/cart', 'ShopController@cart')->name('cart')->middleware('auth');
});

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function() {
    Route::get('home', 'HomeController@index')->name('home');

    Route::namespace('Auth')->group(function() {
        Route::get('login', 'LoginController@showLoginForm')->name('login');
        Route::post('login', 'LoginController@login');
        Route::post('logout', 'LoginController@logout')->name('logout');
    });


    Route::middleware('auth:admin')->namespace('Product')->name('product.')->group(function() {
        Route::get('/product', 'ProductController@index')->name('index');
        Route::get('/product/edit/{product_id}', 'ProductController@edit')->name('edit');
        Route::put('/product/update/{product_id}', 'ProductController@update')->name('update');
    });

});
