<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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
Route::get('/home', [AdminController::class, 'index'])->name('home')->middleware('auth');

// Navbar
Route::get('/pemasok', function () {
    return view('Navbar.pemasok');
})->name('pemasok')->middleware('auth');

Route::get('/kategori', function () {
    return view('Navbar.kategori');
})->name('kategori')->middleware('auth');

Route::get('/produk', function () {
    return view('Navbar.produk');
})->name('produk')->middleware('auth');

