<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TamuController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AcaraController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\AuthController;

Route::get('/', [TamuController::class, 'index'])->name('index');
Route::get('/kategori', [TamuController::class, 'category'])->name('category');
Route::get('/kategori/{nama}', [TamuController::class, 'showByKategori'])->name('artikel.kategori');
Route::get('/kategori/{nama}/artikel/{slug}', [TamuController::class, 'detailArtikel'])->name('artikel.detail');
Route::get('/kategori/acara/{slug}', [TamuController::class, 'detailAcara'])->name('acara.detail');
Route::get('/tentang-kami', [TamuController::class, 'aboutus'])->name('aboutus');

Route::middleware('auth')->group(function () {
    Route::get('/tamu/dashboard', [TamuController::class, 'dashboard'])->name('tamu.index');
    Route::get('/tamu/bookmarks', [BookmarkController::class, 'index'])->name('tamu.bookmark');
    Route::post('/kategori/{acaraId}/bookmarks', [BookmarkController::class, 'store'])->name('bookmark.tambah');
    Route::delete('/tamu/bookmarks/{id}', [BookmarkController::class, 'destroy'])->name('tamu.bookmark.hapus');

    Route::get('/acara', [AcaraController::class, 'index'])->name('tamu.acara');
    Route::get('/acara/tambah', [AcaraController::class, 'create'])->name('tamu.acara.tambah');
    Route::post('/acara/tambah', [AcaraController::class, 'store'])->name('tamu.acara.store');
    Route::get('/acara/edit/{id}', [AcaraController::class, 'edit'])->name('tamu.acara.edit');
    Route::put('/acara/edit/{id}', [AcaraController::class, 'update'])->name('tamu.acara.update');
    Route::delete('/acara/hapus/{id}', [AcaraController::class, 'destroy'])->name('tamu.acara.hapus');
    
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

    Route::get('/admin/tentang-kami', [AdminController::class, 'aboutus'])->name('admin.aboutus');
    Route::get('/admin/tentang-kami/edit/{id}', [AdminController::class, 'editabout'])->name('admin.editabout');
    Route::put('/admin/tentang-kami/edit/{id}', [AdminController::class, 'aboutstore'])->name('admin.aboutstore');

    Route::post('/admin/acara/approve/{id}', [AcaraController::class, 'approve'])->name('status.approve');
    Route::post('/admin/acara/reject/{id}', [AcaraController::class, 'reject'])->name('status.reject');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function() {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginpost'])->name('loginpost');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
});