<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\StockTransaction;
use Illuminate\Http\Request;

class StockTransactionController extends Controller
{
    public function createIn()
    {
        $items = Item::all();

        return view('transactions.stock_in', compact('items'));
    }

    public function storeIn(Request $request)
    {
        $item = Item::findOrFail($request->item_id);

        $item->current_stock += $request->quantity;
        $item->save();

        StockTransaction::create([
            'item_id' => $item->id,
            'transaction_type' => 'in',
            'quantity' => $request->quantity,
            'balance_after' => $item->current_stock,
            'reference_no' => $request->reference_no,
            'transaction_date' => now(),
            'operator_name' => auth()->user()->name,
            'notes' => $request->notes,
        ]);

        return redirect()->route('items.index')
            ->with('success', 'Stok berhasil ditambahkan');
    }

    public function createOut()
    {
        $items = Item::all();

        return view('transactions.stock_out', compact('items'));
    }

    public function storeOut(Request $request)
    {
        $item = Item::findOrFail($request->item_id);

        if ($item->current_stock < $request->quantity) {
            return back()->with('error', 'Stok tidak mencukupi');
        }

        $item->current_stock -= $request->quantity;
        $item->save();

        StockTransaction::create([
            'item_id' => $item->id,
            'transaction_type' => 'out',
            'quantity' => $request->quantity,
            'balance_after' => $item->current_stock,
            'reference_no' => $request->reference_no,
            'transaction_date' => now(),
            'operator_name' => auth()->user()->name,
            'notes' => $request->notes,
        ]);

        return redirect()->route('items.index')
            ->with('success', 'Stok berhasil dikurangi');
    }
}