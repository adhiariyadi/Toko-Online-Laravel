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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});

Auth::routes();
Auth::routes(['verify' => true]);

Route::middleware(['auth'])->group(function () {
  Route::get('/', 'MobilController@home')->name('home');
  Route::get('/home', 'MobilController@home')->name('home');
  Route::get('/mobil/tambah', 'MobilController@tambah')->name('mobil.tambah');
  Route::post('/mobil/insert', 'MobilController@insert')->name('mobil.insert');
  Route::get('/cart', 'MobilController@cart')->name('cart');
  Route::get('/add-to-cart/{id}', 'MobilController@addToCart')->name('add-to-cart');
  Route::get('/profil/{id}', 'AkunController@profil')->name('profil');
  Route::get('/edit_profil/{id}', 'AkunController@edit_profil')->name('edit_profil');
  Route::post('/akun/simpan/{id}', 'AkunController@simpan')->name('akun.simpan');
  Route::patch('/update_cart', 'MobilController@update_cart')->name('update_cart');
  Route::delete('/remove', 'MobilController@remove')->name('remove');
  Route::patch('/order/bayar/{id}', 'OrderController@bayar')->name('order.bayar');
  Route::get('/cekout', 'MobilController@cekout')->name('cekout');
  Route::get('/pembayaran/{id}', 'MobilController@pembayaran')->name('pembayaran');
  Route::post('/proses_cekout/{id}', 'MobilController@proses_cekout')->name('proses_cekout');
});

Route::middleware(['auth', 'role'])->group(function () {
  Route::resource('/merek', 'MerekController');
  Route::get('/order/tampil_cancel', 'OrderController@tampil_cancel')->name('order.tampil_cancel');
  Route::get('/order/tampil_bayar', 'OrderController@tampil_bayar')->name('order.tampil_bayar');
  Route::get('/order/tampil_pending', 'OrderController@tampil_pending')->name('order.tampil_pending');
  Route::resource('/order', 'OrderController');
  Route::resource('/akun', 'AkunController');
  Route::get('/mobil/tampil_hapus', 'MobilController@tampil_hapus')->name('mobil.tampil_hapus');
  Route::get('/mobil/restore/{id}', 'MobilController@restore')->name('mobil.restore');
  Route::delete('/mobil/kill/{id}', 'MobilController@kill')->name('mobil.kill');
  Route::resource('/mobil', 'MobilController');
});
