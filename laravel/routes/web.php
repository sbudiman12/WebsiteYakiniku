<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/products', [ProdukController::class, 'all'])->middleware('admin')->name('produks.index');

Route::get('/products/{produk}', [ProdukController::class, 'lihatSatu'])->middleware('admin');
Route::get('/kategoris/{kategori}', [KategoriController::class, 'lihatSatu'])->middleware('admin');

Route::get('/addproduct', [ProdukController::class, 'create'])->name('produks.create')->middleware('admin');
Route::post('/products/add', [ProdukController::class, 'store'])->name('produks.store')->middleware('admin');

Route::get('/produks/{id}/edit', [ProdukController::class, 'edit'])->name('produks.edit')->middleware('admin');
Route::put('/produks/{id}', [ProdukController::class, 'update'])->name('produks.update')->middleware('admin');

Route::delete('/produks/{id}', [ProdukController::class, 'destroy'])->name('produks.destroy')->middleware('admin');

Route::get('/kategoris', [KategoriController::class, 'all'])->name('kategoris.index');

Route::get('/kategorisadd', [KategoriController::class, 'create'])->name('kategoris.create')->middleware('admin');
Route::post('/kategoris', [KategoriController::class, 'store'])->name('kategoris.store')->middleware('admin');
Route::get('/kategorisedit/{kategori}', [KategoriController::class, 'edit'])->name('kategori.edit')->middleware('admin');
Route::put('/kategoris/{kategori}', [KategoriController::class, 'update'])->name('kategoris.update')->middleware('admin');

Route::delete('/kategoris/{kategori}', [KategoriController::class, 'destroy'])->name('kategoris.destroy')->middleware('admin');


Route::get('/profile', [ProfileController::class, 'index'])->name('profile');


// Route::get('/', [ProdukController::class, 'showProducts']);

Route::get('/transaksis', [TransaksiController::class,'all'])->middleware('admin');

Route::get('/transaksis/{transaksi}', [TransaksiController::class, 'view']);

Route::patch('/transaksis/update-status/{transaksi}', [TransaksiController::class, 'updateStatus']);



Route::get('/produk-ayam', [ProdukController::class, 'ayam']);



Route::get('/produk-ikan', [ProdukController::class, 'ikan']);



Route::get('/produk-sapi', [ProdukController::class, 'sapi']);


Route::get('/produk-snacks', [ProdukController::class, 'snacks']);


Route::get('/home', [ProdukController::class, 'showProducts']);


