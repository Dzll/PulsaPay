<?php

use Illuminate\Http\Request;
use App\User;
use App\Transaksi;
use App\PulsaPay;
use App\PayData;
use App\PulsaData;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Tampilkan semua data pulsa
Route::get('/pulsa/datapulsa', 'ApiController@dataPulsa');
// Tampilkan single data pulsa
Route::get('/pulsa/singledata', 'ApiController@singledatapulsa');

// Data Transaksi
Route::get('/pulsa/datatransaksi/{id_user}', 'ApiController@dataTransaksi');
Route::post('/pulsa/transaksiadd', 'ApiController@transaksiadd');

// User
Route::post('/pulsa/loginuser', 'ApiController@loginuser');
Route::post('/pulsa/regisuser', 'ApiController@regisuser');

// PulsaPay
Route::get('/pulsa/pulsapay/{id_user}', 'ApiController@pulsapay');
Route::get('/pulsa/paydata/{id_user}', 'ApiController@paydata');
Route::post('/pulsa/payadd', 'ApiController@payadd');
Route::post('/pulsa/PulsaPayUp', 'ApiController@payUp');

// Admin Control Panel
Route::get('pulsa/dataTran', 'ApiController@trans');
Route::get('pulsa/dataUser', 'ApiController@user');
Route::get('pulsa/datatopup', 'ApiController@topup');
Route::post('pulsa/UpTopup', 'ApiController@UpTopup');

Route::post('pulsa/dataTranUp', 'ApiController@transUpPost');

Route::post('pulsa/addpulsa', 'ApiController@pulsaadd');
Route::post('pulsa/editpulsa', 'ApiController@pulsaedit');

// Dzulkarnain_Inc | 2019 Copyright.
// PulsaKu @Copyright 2019 | All Right Reserved.
// No Pulsa, No Life
// BebasTapiSopan
// janganLupaTitikKoma;
