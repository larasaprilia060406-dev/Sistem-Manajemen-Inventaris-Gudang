<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\StockTransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Data Barang
    Route::resource('items', ItemController::class);

    // Stok Masuk
    Route::get('/stock-in', [StockTransactionController::class, 'createIn'])->name('stock.in');
    Route::post('/stock-in', [StockTransactionController::class, 'storeIn'])->name('stock.in.store');

    // Stok Keluar
    Route::get('/stock-out', [StockTransactionController::class, 'createOut'])->name('stock.out');
    Route::post('/stock-out', [StockTransactionController::class, 'storeOut'])->name('stock.out.store');

});

require __DIR__.'/auth.php';