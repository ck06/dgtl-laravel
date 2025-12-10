<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    protected $fillable = [
        'brand',
        'name',
        'description',
        'price',
    ];

    public function brand(): HasOne
    {
        return $this->hasOne(Brand::class);
    }
}
