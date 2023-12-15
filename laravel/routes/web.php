<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('omah');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/products', [ProdukController::class,'all'] )->middleware('admin')->name('produks.index');
Route::get('/products/{produk}', [ProdukController::class,'lihatSatu'] )->middleware('admin');
Route::get('/kategoris/{kategori}', [KategoriController::class,'lihatSatu'] )->middleware('admin');

Route::get('/addproduct', [ProdukController::class, 'create'])->name('produks.create')->middleware('admin');
Route::post('/produks', [ProdukController::class, 'store'])->name('produks.store')->middleware('admin');




