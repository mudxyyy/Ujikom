<?php

use App\Models\detailtransaksi;
use App\Models\kategori;
use App\Models\produk;
use App\Models\User;
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

Route::get('/', 'ProdukController@home')->name('home');
Route::get('/detail/{produk}', 'ProdukController@detail')->name('detail');

Route::get('/login', 'UserController@login')->name('login');
Route::post('/postlog', 'UserController@postlog')->name('postlog');
Route::get('/reg', 'UserController@reg')->name('reg');
Route::post('/postreg', 'UserController@postreg')->name('postreg');


Route::middleware('auth')->group(function () {
    Route::get('/logout', 'UserController@logout')->name('logout');

    Route::get('/ker', 'ProdukController@ker')->name('ker');
    Route::post('/updatekeranjang{detailtransaksi}', 'ProdukController@updatekeranjang')->name('updatekeranjang');
Route::post('/postker/{produk}', 'ProdukController@postker')->name('postker');
Route::get('/dltker{detailtransaksi}', function(detailtransaksi $detailtransaksi){
    $detailtransaksi->delete();
    $produk = $detailtransaksi->produk;
    return back()->with('status','Berhasil hapus : ' .$produk->name);
})->name('dltker');

Route::get('/bayar/{detailtransaksi}', 'ProdukController@bayar')->name('bayar');
Route::post('/prosesbayar/{detailtransaksi}', 'ProdukController@prosesbayar')->name('prosesbayar');

Route::get('/sum', 'ProdukController@sum')->name('sum');

// Kelola User
Route::get('/index', 'AdminController@index')->name('adm.index');

Route::get('/tambah', 'AdminController@tambah')->name('adm.tambah');
Route::post('/postambah', 'AdminController@posttambah')->name('posttambah');

Route::get('/edit/{user}', 'AdminController@edit')->name('adm.edit');
Route::post('/postedit/{user}', 'AdminController@postedit')->name('postedit');

Route::get('/hpsuser/{user}', function(user $user) {
    $user->delete();
    return back()->with('status','Berhasil hapus : ' .$user->name);
})->name('hpsuser');


// Kelola Produk
Route::get('/produkindex', 'AdminController@produkindex')->name('prk.index'); 

Route::get('/vtambahproduk', 'AdminController@vtambahproduk')->name('prk.tambah');
Route::post('/tambahproduk', 'AdminController@tambahproduk')->name('tambahproduk');

Route::get('/veditproduk{produk}', 'AdminController@veditproduk')->name('prk.edit');
Route::post('/editproduk{produk}', 'AdminController@editproduk')->name('editproduk');

Route::get('/dltproduk{produk}', function(produk $produk){
    $produk->delete();
    return back()->with('status','Berhasil hapus : ' .$produk->name);
})->name('dltproduk') ;


// Kelola Kategori

Route::get('/ktgindex', 'AdminController@ktgindex')->name('ktg.index');

Route::get('/vtambahktg', 'AdminController@vtambahktg')->name('ktg.tambah');
Route::post('/tambahktg', 'AdminController@tambahktg')->name('tambahktg');

Route::get('/veditktg{kategori}', 'AdminController@veditktg')->name('ktg.edit');
Route::post('/editktg{kategori}', 'AdminController@editktg')->name('editktg');

Route::get('/dltktg{kategori}', function(kategori $kategori){
    $kategori->delete();
    return back()->with('status','Berhasil hapus : ' .$kategori->name);
})->name('dltktg');

//kelola transaksi
Route::get('/tv', 'AdminController@tv')->name('transaksi.validasi');
Route::post('/vld{detailtransaksi}', 'AdminController@vld')->name('vld');

});
