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

Route::get('/', 'MainController@index')->name('index');

Route::get('/product-details', function () {
    return view('product-details');
});

Route::get('/products', function (){
    return view('products');
});

Route::get('/cart', function (){
    return view('cart');
});

Route::get('/checkout', function () {
    return view('checkout');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
