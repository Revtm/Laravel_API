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
//
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/tidakdikenali', 'BarangController@tidakdikenali')->name('tidakdikenali');
Route::get('/', 'Login@index')->name('halamanlogin');
Route::post('/login', 'Login@cekLogin')->name('login');

Route::get('/beranda', 'Beranda@index')->name('beranda');
Route::get('/logout', 'Beranda@cekLogout');
