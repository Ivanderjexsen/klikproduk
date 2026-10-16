
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\PosterController;


Route::get('/poster-ai', [PosterController::class, 'index'])
    ->name('poster.index');

Route::post('/poster-ai', [PosterController::class, 'generate'])
    ->name('poster.generate');
    
// Halaman publik
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/produk', [ProductController::class, 'index'])
    ->name('products.index');

// Login dan logout admin
Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/admin/login', [AdminAuthController::class, 'login'])
        ->name('login.submit');
});

Route::post('/admin/logout', [AdminAuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Khusus admin yang sudah login
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/produk/tambah', [ProductController::class, 'create'])
        ->name('products.create');

    Route::post('/produk', [ProductController::class, 'store'])
        ->name('products.store');

    Route::get('/produk/{product}/edit', [ProductController::class, 'edit'])
        ->name('products.edit');

    Route::put('/produk/{product}', [ProductController::class, 'update'])
        ->name('products.update');

    Route::delete('/produk/{product}', [ProductController::class, 'destroy'])
        ->name('products.destroy');
});


