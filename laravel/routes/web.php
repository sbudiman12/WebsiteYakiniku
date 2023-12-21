<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Models\Keranjang;
use App\Http\Controllers\FavoritesController;

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



Route::get('/', [ProdukController::class, 'showProducts'])->name('home');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('homes');

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



Route::get('/transaksis', [TransaksiController::class, 'all'])->middleware('admin');

Route::get('/transaksis/{transaksi}', [TransaksiController::class, 'view'])->middleware('admin');

Route::patch('/transaksis/update-status/{transaksi}', [TransaksiController::class, 'updateStatus'])->middleware('admin');


Route::get('/keranjang' ,[KeranjangController::class, 'all'])->middleware('auth');

Route::patch('/keranjang/update-quantity/{id}', [KeranjangController::class, 'updateQuantity'])->middleware('web');

Route::delete('/keranjang/remove/{id}', [KeranjangController::class, 'removeFromCart']);
Route::delete('/favorites/remove/{id}', [FavoritesController::class, 'removeFromFavorites']);


Route::view('/admin', 'admin/blank')->middleware('admin');



Route::get('/produk-ayam', [ProdukController::class, 'ayam']);



Route::get('/produk-ikan', [ProdukController::class, 'ikan']);



Route::get('/produk-sapi', [ProdukController::class, 'sapi']);


Route::get('/produk-snacks', [ProdukController::class, 'snacks']);


// Route::get('/home', [ProdukController::class, 'index']);

Route::get('/product/{produk}', [ProdukController::class,'related']);

Route::post('/pembayaran/process', [KeranjangController::class, 'processPayment'])->name('pembayaranprocess');

Route::post('/showformpembayaran', [KeranjangController::class, 'showPayment'])->name('lihat.form')->middleware('auth');


Route::post('/keranjang/add-to-cart/{productId}', [KeranjangController::class,'addToCart'])->name('keranjang.addToCart')->middleware('auth');
Route::get('/profil', [ProfileController::class, 'show'])->name('ndelok.show')->middleware('auth');

// Route to display the user's profile
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');

// Route to display the edit form for the user's profile
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

// Route to handle the form submission and update the user's profile
Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
// // Route to display the edit form for the user's profile
// Route::get('/ndelok/edit', [ProfileController::class, 'edit'])->name('ndelok.edit');

// routes/web.php

Route::post('/', [TransaksiController::class,'view1'])->middleware('auth')->name('transaksi.detail');

// // Route to handle the form submission and update the user's profile
// Route::put('/ndelok/update', [ProfileController::class, 'update'])->name('ndelok.update');


Route::get('/product/{id}', [ProdukController::class, 'show'])->name('product.show');

// Route to handle adding a product to favorites
// Route to handle adding a product to favorites
Route::post('/favorites/add-to-favorites/{productId}', [FavoritesController::class, 'addToFavorites'])->name('favorites.addToFavorites')->middleware();

// View favorites
Route::get('/favorites' ,[FavoritesController::class, 'all'])->middleware('auth');

Auth::routes();
