<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
    protected $fillable = [
        'order',
        'product',
        'price',
        'amount',
    ];

    protected $appends = ['total_price'];

    public function getTotalPriceAttribute()
    {
        return $this->price * $this->amount;
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
