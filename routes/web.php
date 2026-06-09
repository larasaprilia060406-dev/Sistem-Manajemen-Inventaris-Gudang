<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\StockTransactionController;

Route::get('/', [DashboardController::class,'index']);

Route::resource('items', ItemController::class);

Route::resource('transactions', StockTransactionController::class);