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

Auth::routes();
Route::group(['middleware' => ['auth','roles','web']] , function(){
    Route::group(['roles'=>'admin'],function(){
        Route::resource('/admin' , 'admin_beranda');
        Route::get('/home', 'HomeController@index')->name('home');
        Route::resource('/penjualan_admin' , 'penjualan_admin');
        Route::resource('/produk_admin' , 'produk_admin');
    });
    Route::group(['roles'=>'kasir'],function(){
        Route::resource('/' , 'c_beranda');
        Route::resource('/produk' , 'c_produk');
        Route::resource('/pembayaran' , 'c_pembayaran');
        Route::resource('/penjualan' , 'c_penjualan');
        Route::get('/penjualan/PDF', 'c_penjualan@PDF')->name('PDF');
        Route::get('/live_search/ajax' , 'c_pembayaran@search')->name('search');
    }); 
}); 

Route::get('logout' , 'Auth\LoginController@logout');
