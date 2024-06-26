<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\ProdukController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', function() {
    return view('welcome');
});

// Login admin
Route::get('/login', [AdminController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AdminController::class, 'login']);
Route::get('/register', [AdminController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AdminController::class, 'register']);
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
Route::get('/home', [PemasokController::class, 'index'])->name('home')->middleware('auth');

// Table
Route::resource('kategori', KategoriController::class)->middleware('auth');
Route::resource('pemasok', PemasokController::class)->middleware('auth');
Route::resource('produk', ProdukController::class)->middleware('auth');
