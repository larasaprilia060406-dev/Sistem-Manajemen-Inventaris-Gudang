<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StockTransactionController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/transactions',
        [StockTransactionController::class, 'index']
    )->name('transactions.index');


    // Profile
    Route::get('/profile',
        [ProfileController::class, 'edit']
    )->name('profile.edit');

    Route::patch('/profile',
        [ProfileController::class, 'update']
    )->name('profile.update');

    Route::delete('/profile',
        [ProfileController::class, 'destroy']
    )->name('profile.destroy');


    // Data Barang
    Route::resource('items', ItemController::class);


    // Khusus Admin

    Route::resource('users', UserController::class);

    Route::get('/stock-in',
        [StockTransactionController::class, 'createIn']
    )->name('stock.in');

    Route::post('/stock-in',
        [StockTransactionController::class, 'storeIn']
    )->name('stock.in.store');

    Route::get('/stock-out',
        [StockTransactionController::class, 'createOut']
    )->name('stock.out');

    Route::post('/stock-out',
        [StockTransactionController::class, 'storeOut']
    )->name('stock.out.store');

});

require __DIR__.'/auth.php';