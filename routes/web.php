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

Route::get('/', 'PagesController@index');

Route::get('/pembelian/{pulsa_datas}', 'PagesController@pembelian')->middleware('auth');

Route::get('/login', 'PagesController@login')->name('login');
Route::post('/login', 'AuthController@login');

Route::get('/register', 'PagesController@register');
Route::post('/register', 'AuthController@register');

Route::get('/logout', 'AuthController@logout');

Route::get('/pembelian/{id}/pulsapay', 'PagesController@pulsapay')->middleware('auth');
Route::post('/pembelian/{id}/pulsapay', 'AuthController@pulsainsert');

Route::get('/riwayat', 'PagesController@riwayat');

Route::get('/pembelian/{id}/bayar_bank', 'PagesController@bayar_bank')->middleware('auth');

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
