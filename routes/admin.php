<?php

use Illuminate\Support\Facades\Route;
Route::get('/', 'DashboardController');

Route::resource('/banners', 'BannerController');

Route::resource('/categories', 'CategoryController');

Route::resource('/brands', 'BrandController');

Route::resource('/products', 'ProductController');

Route::resource('/contacts', 'ContactController');

Route::resource('/sponsors', 'SponsorController');

Route::resource('/orders', 'OrderController');

Route::get('/orders', 'OrderController@index')->name('orders.index');
Route::get('/orders/{order}', 'OrderController@show')->name('orders.show');
Route::post('/orders/{order}/status', 'OrderController@updateStatus')->name('orders.update.status');
Route::delete('/orders/{order}', 'OrderController@destroy')->name('orders.destroy');

Route::get('/filemanager', function (){
    return view('admin.file-manager.index');
});

Route::group(['prefix' => 'laravel-file-manager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
