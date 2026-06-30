<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\StockTransaction;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        // Ambil semua data barang
        $items = Item::all();

        // Ambil semua transaksi beserta data barang
        $transactions = StockTransaction::with('item')
            ->latest()
            ->get();

        // Kirim ke halaman laporan
        return view('reports.index', compact(
            'items',
            'transactions'
        ));
    }
}