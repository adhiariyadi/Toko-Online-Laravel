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

Route::get('/clear-cache', function () {
  Artisan::call('config:clear');
  Artisan::call('cache:clear');
  Artisan::call('config:cache');
  return 'DONE';
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
  Route::middleware(['role'])->group(function () {
    Route::resource('/merek', 'MerekController');
    Route::resource('/order', 'OrderController');
    Route::get('/order/tampil_cancel', 'OrderController@tampil_cancel')->name('order.tampil_cancel');
    Route::get('/order/tampil_bayar', 'OrderController@tampil_bayar')->name('order.tampil_bayar');
    Route::get('/order/tampil_pending', 'OrderController@tampil_pending')->name('order.tampil_pending');
    Route::resource('/akun', 'AkunController');
    Route::resource('/mobil', 'MobilController');
    Route::get('/create/mobil', 'MobilController@create')->name('create.mobil');
    Route::get('/mobil/tampil_hapus', 'MobilController@tampil_hapus')->name('mobil.tampil_hapus');
    Route::get('/mobil/restore/{id}', 'MobilController@restore')->name('mobil.restore');
    Route::delete('/mobil/kill/{id}', 'MobilController@kill')->name('mobil.kill');
  });

  Route::get('/', 'MobilController@home')->name('home');
  Route::get('/home', 'MobilController@home')->name('home');
  Route::get('/favorite', 'MobilController@favorite')->name('favorite');
  Route::get('/like/{id}', 'MobilController@like')->name('like');
  Route::get('/unlike/{id}', 'MobilController@unlike')->name('unlike');
  Route::get('/cart', 'MobilController@cart')->name('cart');
  Route::get('/add-to-cart/{id}', 'MobilController@addToCart')->name('add-to-cart');
  Route::get('/mobil/{id}', 'MobilController@show')->name('mobil.show');
  Route::get('/profil/{id}', 'AkunController@profil')->name('profil');
  Route::get('/edit_profil/{id}', 'AkunController@edit_profil')->name('edit_profil');
  Route::post('/akun/simpan/{id}', 'AkunController@simpan')->name('akun.simpan');
  Route::patch('/update_cart', 'MobilController@update_cart')->name('update_cart');
  Route::delete('/remove', 'MobilController@remove')->name('remove');
  Route::delete('/order/{id}', 'OrderController@destroy')->name('order.destroy');
  Route::get('/cekout', 'MobilController@cekout')->name('cekout');
  Route::get('/category/{id}', 'MobilController@category')->name('category');
  Route::get('/history', 'OrderController@history')->name('history');
  Route::get('/pembayaran/success', 'OrderController@success')->name('pembayaran.success');
  Route::get('/pembayaran/{id}', 'OrderController@pembayaran')->name('pembayaran');
  Route::patch('/proses_pembayaran/{id}', 'OrderController@proses_pembayaran')->name('proses_pembayaran');
  Route::post('/proses_cekout/{id}', 'MobilController@proses_cekout')->name('proses_cekout');
});
