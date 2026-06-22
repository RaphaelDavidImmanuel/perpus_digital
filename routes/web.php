<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

// landing page nih

Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::get('/', function () {
//     return view('welcome');
// });

// ini dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


// bagian admin nya ya
Route::middleware(['auth', 'admin'])->group(function () {
    // Kategori
    Route::resource('categories', CategoryController::class);
    // Buku
    Route::resource('books', BookController::class);
    // Kelola User
    Route::resource('users', UserController::class)->only(['index', 'edit', 'update', 'destroy']);
});

// ini route buat user lek
// katalog public
Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog.index');
Route::get('/catalog/{book}', [CatalogController::class, 'show'])->name('catalog.show');

Route::middleware(['auth'])->group(function () {
    // Katalog Buku
    Route::get('/catalog/{book}/read', [CatalogController::class, 'read'])->name('catalog.read');
    Route::get('/catalog/{book}/download', [CatalogController::class, 'download'])->name('catalog.download');

    // Riwayat Bacaan
    Route::get('/history', [CatalogController::class, 'history'])->name('history');

    // Profile (Breeze default)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // User Profile (Argon themed)
    Route::get('/user/profile', [UserProfileController::class, 'edit'])->name('user.profile.edit');
    Route::patch('/user/profile/name', [UserProfileController::class, 'updateName'])->name('user.profile.update-name');
    Route::put('/user/profile/password', [UserProfileController::class, 'updatePassword'])->name('user.profile.update-password');
});

require __DIR__ . '/auth.php';
