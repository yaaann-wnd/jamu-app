<?php

use App\Http\Controllers\berandaController;
use App\Http\Controllers\jamuController;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\postController;
use App\Http\Controllers\produkController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Auth;
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

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('user', userController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('kategori', kategoriController::class);
    Route::resource('post', postController::class);
    Route::resource('produk', produkController::class);
});

Route::resource('jamu', jamuController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [berandaController::class, 'index'])->name('beranda.index');

Route::get('produk-home', [berandaController::class, 'produk'])->name('beranda.produk');

Route::get('/{id}', [berandaController::class, 'show'])->name('beranda.show');

Route::get('produk/{id}', [berandaController::class, 'showProduk'])->name('beranda.showProduk');

