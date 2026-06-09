<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockTransaction extends Model
{
    protected $fillable = [
        'item_id',
        'transaction_type',
        'quantity',
        'balance_after',
        'reference_no',
        'transaction_date',
        'operator_name',
        'notes'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
