<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\StockTransaction;

class DashboardController extends Controller
{
    public function index()
    {
        $totalItems = Item::count();

        $stockIn = StockTransaction::where(
            'transaction_type',
            'in'
        )->sum('quantity');

        $stockOut = StockTransaction::where(
            'transaction_type',
            'out'
        )->sum('quantity');

        $lowStock = Item::whereColumn(
            'current_stock',
            '<=',
            'min_stock'
        )->count();

        return view('dashboard', compact(
            'totalItems',
            'stockIn',
            'stockOut',
            'lowStock'
        ));
    }
}