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

Auth::routes();

Route::get('/', 'HomeController')->name('home.index');
Route::get('/products', 'ProductController@index')->name('product.index');


Route::get('/gio-hang', 'CartController@index')->name('cart.index');
Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');
Route::post('/checkout', 'CartController@checkout')->name('checkout');
Route::post('/cart/{product}', 'CartController@store')->name('cart.store');


Route::get('/contact', 'ContactController@index')->name('contact.index');
Route::post('/contact', 'ContactController@store')->name('contact.store');

Route::get('/san-pham/{product}', 'ProductController@show')->name('product.show');
Route::get('/{category}', 'CategoryController@show')->name('category.show');
