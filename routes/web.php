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
Route::get('/','ControllerHalaman@loginPage');
Route::get('/home','ControllerHalaman@homePage');
Route::get('/login','ControllerHalaman@loginPage');
Route::get('/register','ControllerHalaman@registerPage');
Route::get('/detail','ControllerHalaman@detailPage');
Route::get('/admin','ControllerHalaman@adminPage');
Route::get('/profile','ControllerHalaman@profilePage');
Route::get('/logout','ControllerHalaman@logout');

Route::post('/prosesRegister','ControllerHalaman@prosesRegister');
Route::post('/prosesLogin','ControllerHalaman@prosesLogin');
Route::post('/tambahPenginapan','ControllerHalaman@tambahPenginapan');
Route::post('/topup','ControllerHalaman@topup');
Route::post('/book','ControllerHalaman@book');

Route::get('detailPage/{nama}','ControllerHalaman@detailPage');
