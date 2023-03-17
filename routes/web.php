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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');

//routes produk
Route::get('/produk', [App\Http\Controllers\ProdukController::class, 'index'])->name('produk.index');
Route::post('/produk/tambah',[App\Http\Controllers\ProdukController::class, 'store'])->name('produk.store');
Route::get('/produk/hapus/{id_produk}',[App\Http\Controllers\ProdukController::class, 'destroy'])->name('produk.destroy');
Route::put('/produk/edit/{id_produk}',[App\Http\Controllers\ProdukController::class, 'update'])->name('produk.update');

//routes member
Route::get('/member', [App\Http\Controllers\MemberController::class, 'index'])->name('member.index');
Route::post('/member/tambah',[App\Http\Controllers\MemberController::class, 'store'])->name('member.store');
Route::get('/member/hapus/{id_member}',[App\Http\Controllers\MemberController::class, 'destroy'])->name('member.destroy');
Route::put('/member/edit/{id_member}',[App\Http\Controllers\MemberController::class, 'update'])->name('member.update');

//routes kategori
Route::get('/kategori', [App\Http\Controllers\KategoriController::class, 'index'])->name('kategori.index');
Route::post('/kategori/tambah',[App\Http\Controllers\KategoriController::class, 'store'])->name('kategori.store');
Route::get('/kategori/hapus/{id_kategori}',[App\Http\Controllers\KategoriController::class, 'destroy'])->name('kategori.destroy');
Route::put('/kategori/edit/{id_kategori}',[App\Http\Controllers\KategoriController::class, 'update'])->name('kategori.update');

//routes outlet
Route::get('/outlet', [App\Http\Controllers\OutletController::class, 'index'])->name('outlet.index');
Route::post('/outlet/tambah',[App\Http\Controllers\OutletController::class, 'store'])->name('outlet.store');
Route::get('/outlet/hapus/{id_outlet}',[App\Http\Controllers\OutletController::class, 'destroy'])->name('outlet.destroy');
Route::put('/outlet/edit/{id_outlet}',[App\Http\Controllers\OutletController::class, 'update'])->name('outlet.update');

//routes transaksi
Route::get('/transaksi', [App\Http\Controllers\TransaksiController::class, 'index'])->name('transaksi.index');
Route::post('/transaksi/tambah',[App\Http\Controllers\TransaksiController::class, 'store'])->name('transaksi.store');
Route::get('/transaksi/hapus/{id_transaksi}',[App\Http\Controllers\TransaksiController::class, 'destroy'])->name('transaksi.destroy');
Route::put('/transaksi/edit/{id_transaksi}',[App\Http\Controllers\TransaksiController::class, 'update'])->name('transaksi.update');

//routes dashboard
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');
Route::post('/dashboard/tambah',[App\Http\Controllers\DashboardController::class, 'store'])->name('dashboard.store');
Route::get('/dashboard/hapus/{id_dashboard}',[App\Http\Controllers\DashboardController::class, 'destroy'])->name('dashboard.destroy');
Route::put('/dashboard/edit/{id_dashboard}',[App\Http\Controllers\DashboardController::class, 'update'])->name('dashboard.update');