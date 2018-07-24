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

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


//user
Route::get('/', 'PageController@index')->name('home');

//cart
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::delete('cart/clear', 'CartController@clear')->name('cart.clear');
Route::post('cart/{product}', 'CartController@store')->name('cart.store');
Route::delete('cart/{rowId}', 'CartController@destroy')->name('cart.destroy');
Route::get('cart/{rowId}/edit', 'CartController@edit')->name('cart.edit');
Route::patch('cart/{rowId}', 'CartController@update')->name('cart.update');
//alamat pengiriman
Route::get('alamat-pengiriman', 'CartController@alamatPengiriman')->name('cart.alamat.pengiriman');
Route::post('alamat-pengiriman/{user}', 'CartController@updateAlamatPengiriman')->name('cart.update.alamat.pengiriman');
Route::get('konfirmasi-pembelian', 'CartController@konfirmasiPembelian')->name('cart.konfirmasi.pembelian');



//admin
Route::get('/dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');