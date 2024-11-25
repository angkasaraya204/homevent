<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TamuController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AcaraController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\AuthController;


Route::get('/', [TamuController::class, 'index'])->name('index');
Route::get('/kategori', [TamuController::class, 'category'])->name('category');
Route::get('/tentang-kami', [TamuController::class, 'aboutus'])->name('aboutus');

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.index');

    Route::get('/admin/kategori', [CategoryController::class, 'index'])->name('admin.kategori');
    Route::get('/admin/kategori/tambah', [CategoryController::class, 'create'])->name('admin.kategori.tambah');
    Route::post('/admin/kategori/tambah', [CategoryController::class, 'store'])->name('admin.kategori.store');
    Route::get('/admin/kategori/edit/{id}', [CategoryController::class, 'edit'])->name('admin.kategori.edit');
    Route::put('/admin/kategori/edit/{id}', [CategoryController::class, 'update'])->name('admin.kategori.update');
    Route::delete('/admin/kategori/hapus/{id}', [CategoryController::class, 'destroy'])->name('admin.kategori.hapus');

    Route::get('/admin/artikel', [ArtikelController::class, 'index'])->name('admin.artikel');
    Route::get('/admin/artikel/tambah', [ArtikelController::class, 'create'])->name('admin.artikel.tambah');
    Route::post('/admin/artikel/tambah', [ArtikelController::class, 'store'])->name('admin.artikel.store');
    Route::get('/admin/artikel/edit/{id}', [ArtikelController::class, 'edit'])->name('admin.artikel.edit');
    Route::put('/admin/artikel/edit/{id}', [ArtikelController::class, 'update'])->name('admin.artikel.update');
    Route::delete('/admin/artikel/hapus/{id}', [ArtikelController::class, 'destroy'])->name('admin.artikel.hapus');

    Route::get('/admin/acara', [AcaraController::class, 'index'])->name('admin.acara');
    Route::get('/admin/acara/tambah', [AcaraController::class, 'create'])->name('admin.acara.tambah');
    Route::post('/admin/acara/tambah', [AcaraController::class, 'store'])->name('admin.acara.store');
    Route::get('/admin/acara/edit/{id}', [AcaraController::class, 'edit'])->name('admin.acara.edit');
    Route::put('/admin/acara/edit/{id}', [AcaraController::class, 'update'])->name('admin.acara.update');
    Route::delete('/admin/acara/hapus/{id}', [AcaraController::class, 'destroy'])->name('admin.acara.hapus');

    Route::get('/admin/tentang-kami', [AdminController::class, 'aboutus'])->name('admin.aboutus');
    Route::get('/admin/tentang-kami/edit/{id}', [AdminController::class, 'editabout'])->name('admin.editabout');
    Route::put('/admin/tentang-kami/edit/{id}', [AdminController::class, 'aboutstore'])->name('admin.aboutstore');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function() {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginpost'])->name('loginpost');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
});