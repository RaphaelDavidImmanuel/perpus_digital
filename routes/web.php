<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// landing page nih

Route::get('/', function () {
    return view('welcome');
});

// ini dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


// bagian admin nya ya
Route::middleware(['auth', 'admin'])->group(function () {
    // Kategori
    Route::resource('categories', CategoryController::class);
    // Buku
    Route::resource('books', BookController::class);

});

// ini route buat user lek

Route::middleware(['auth'])->group(function () {
    // Katalog Buku
    Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog.index');
    Route::get('/catalog/{book}', [CatalogController::class, 'show'])->name('catalog.show');
    Route::get('/catalog/{book}/read', [CatalogController::class, 'read'])->name('catalog.read');
    Route::get('/catalog/{book}/download', [CatalogController::class, 'download'])->name('catalog.download');

    // Riwayat Bacaan
    Route::get('/history', [CatalogController::class, 'history'])->name('history');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
