<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\StockTransaction;

class UserDashboardController extends Controller
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

        return view(
            'user.dashboard',
            compact(
                'totalItems',
                'stockIn',
                'stockOut'
            )
        );
    }
}