<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\StockTransaction;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        // Data Barang
        $items = Item::all();

        // Query Transaksi
        $transactions = StockTransaction::with('item');

        // ===========================
        // Filter Tanggal Awal
        // ===========================
        if ($request->filled('start_date')) {
            $transactions->whereDate(
                'transaction_date',
                '>=',
                $request->start_date
            );
        }

        // ===========================
        // Filter Tanggal Akhir
        // ===========================
        if ($request->filled('end_date')) {
            $transactions->whereDate(
                'transaction_date',
                '<=',
                $request->end_date
            );
        }

        // ===========================
        // Filter Jenis
        // ===========================
        if ($request->filled('jenis')) {
            $transactions->where(
                'transaction_type',
                $request->jenis
            );
        }

        // ===========================
        // Filter Barang
        // ===========================
        if ($request->filled('barang')) {
            $transactions->where(
                'item_id',
                $request->barang
            );
        }

        $transactions = $transactions
            ->latest()
            ->get();

        // Statistik
        $totalBarang = Item::count();

        $totalStok = Item::sum('current_stock');

        $totalTransaksi = $transactions->count();

        $barangMenipis = Item::whereColumn(
            'current_stock',
            '<=',
            'min_stock'
        )->count();

        return view('reports.index', compact(
            'items',
            'transactions',
            'totalBarang',
            'totalStok',
            'totalTransaksi',
            'barangMenipis'
        ));
    }

    public function exportPdf()
{
    $items = Item::all();

    $transactions = StockTransaction::with('item')
        ->latest()
        ->get();

    $totalBarang = Item::count();

    $totalStok = Item::sum('current_stock');

    $totalTransaksi = $transactions->count();

    $barangMenipis = Item::whereColumn(
        'current_stock',
        '<=',
        'min_stock'
    )->count();

    $pdf = Pdf::loadView('reports.pdf.report', compact(
        'items',
        'transactions',
        'totalBarang',
        'totalStok',
        'totalTransaksi',
        'barangMenipis'
    ));

    $pdf->setPaper('A4', 'landscape');

    return $pdf->download('laporan-inventaris.pdf');
}
}