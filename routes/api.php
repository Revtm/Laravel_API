<?php

use Illuminate\Http\Request;
use App\Gudang;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('gudang', 'BarangController@index');
Route::get('satubarang/{id_barang}', 'BarangController@satu');
Route::post('barangbaru','BarangController@barangbaru');
Route::post('editbarang/{id_barang}', 'BarangController@editbarang');
Route::delete('hapusbarang/{id_barang}', 'BarangController@hapusbarang');
