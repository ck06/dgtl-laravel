<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'country',
        'city',
        'street',
        'house_number',
        'house_number_suffix',
    ];

    protected static function boot(): void {
        parent::boot();

        static::creating(function ($address) {
            // hardcoded - won't be shown in the edit/create forms either.
            $address->country = 'Netherlands';
        });
    }
}
