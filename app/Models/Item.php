<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'item_code',
        'name',
        'category',
        'unit',
        'current_stock',
        'min_stock',
        'max_stock',
        'location',
        'description'
    ];


    public function transactions()
    {
        return $this->hasMany(StockTransaction::class);
    }
}
