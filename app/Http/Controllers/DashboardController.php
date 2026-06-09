<?php

namespace App\Http\Controllers;

use App\Models\Item;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBarang = Item::count();

        return view('dashboard', compact('totalBarang'));
    }
}
