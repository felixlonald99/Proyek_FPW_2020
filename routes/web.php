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
Route::get('/','ControllerHalaman@homePage');
Route::get('/home','ControllerHalaman@homePage');
Route::get('/login','ControllerHalaman@loginPage');
Route::get('/register','ControllerHalaman@registerPage');
Route::post('/prosesRegister','ControllerHalaman@prosesRegister');
Route::post('/prosesLogin','ControllerHalaman@prosesLogin');
Route::get('/promocode','ControllerHalaman@promocode');
Route::get('/findRoompage','ControllerHalaman@findroompage');
Route::post('/findRoom','ControllerHalaman@findRoom');


Route::group(['middleware' => ['CheckUserLogin']], function () {
    Route::get('/profile','ControllerHalaman@profilePage');
    Route::get('/logout','ControllerHalaman@logout');
    Route::get('/history','ControllerHalaman@historyPage');
    Route::get('/cancelbooking/{booking_number?}','ControllerHalaman@cancelbook');

    Route::post('/changePassword','ControllerHalaman@changePassword');
    Route::post('/tambahPenginapan','ControllerHalaman@tambahPenginapan');
    Route::post('/topup','ControllerHalaman@topup');
    Route::post('/book','ControllerHalaman@book');
    Route::post('/bookRoomGuest','ControllerHalaman@bookRoomGuest');
    Route::get('detailPage/{nama}','ControllerHalaman@detailPage');

    Route::get('/checkout/{booking_number?}','CheckoutController@checkout');
    Route::get('/checkout/{booking_number?}/{promo_code?}','CheckoutController@checkout');
    Route::post('checkout/{booking_number?}','CheckoutController@afterpayment')->name('checkout.credit-card');


    Route::post('/paywith','ControllerHalaman@paywith');
    Route::post('/dopaywith','ControllerHalaman@dopaywith');
    Route::post('/cekpromocode','ControllerHalaman@cekpromocode');
    Route::post('/paycash','ControllerHalaman@paycash');
});

// ======================== ADMIN ========================
Route::get('/admin','AdminController@adminpage');
Route::post('/dologinadmin','AdminController@dologinadmin');
Route::get('/adminlogout','AdminController@adminlogout');

//=== page navigation ===
Route::get('/masteruserpage','AdminController@masteruserpage');
Route::get('/masterbookingpage','AdminController@masterbookingpage');
Route::get('/masterpromopage','AdminController@masterpromopage');
Route::get('/addnewbookingpage','AdminController@addnewbookingpage');
Route::get('/addservicepage','AdminController@addservicepage');
Route::get('/detailbooking','AdminController@detailbooking');
Route::get('/bookedroompage','AdminController@bookedroompage');
Route::get('/invoice','AdminController@invoice');

Route::post('/insertpromo','AdminController@insertpromo');
Route::post('/deletepromo','AdminController@deletepromo');
Route::post('/insertservice','AdminController@insertservice');
Route::post('/bookRoom','AdminController@bookRoom');

//=== detail booking ===
Route::post('/changepaymentstatus','AdminController@changepaymentstatus');
Route::post('/assignroom','AdminController@assignroom');
Route::post('/setbookingpending','AdminController@setbookingpending');
Route::post('/setbookingcheckedin','AdminController@setbookingcheckedin');
Route::post('/setbookingcheckedout','AdminController@setbookingcheckedout');

//=== filter master booking ===
Route::get('/filterpaymentpending','AdminController@filterpaymentpending');
Route::get('/filterpaymentpaid','AdminController@filterpaymentpaid');
Route::get('/filterstatuspending','AdminController@filterstatuspending');
Route::get('/filterstatuscheckedin','AdminController@filterstatuscheckedin');
Route::get('/filterstatuscheckedout','AdminController@filterstatuscheckedout');

Route::post('/filtertanggal','AdminController@filtertanggal');





