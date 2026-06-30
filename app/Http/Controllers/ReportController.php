<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\StockTransaction;

class ReportController extends Controller
{
    public function index()
    {
        $items = Item::all();

        $transactions = StockTransaction::with('item')
                        ->latest()
                        ->get();

        // Statistik
        $totalBarang = Item::count();

        $totalStok = Item::sum('current_stock');

        $totalTransaksi = StockTransaction::count();

        $barangMenipis = Item::whereColumn('current_stock', '<=', 'min_stock')->count();

        return view('reports.index', compact(
            'items',
            'transactions',
            'totalBarang',
            'totalStok',
            'totalTransaksi',
            'barangMenipis'
        ));
    }
}