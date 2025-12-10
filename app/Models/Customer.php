<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'email',
        'address',
        'billing_address',
    ];

    public function address(): HasOne
    {
        return $this->hasOne(Address::class);
    }

    public function billingAddress(): HasOne
    {
        return $this->hasOne(Address::class);
    }
}
