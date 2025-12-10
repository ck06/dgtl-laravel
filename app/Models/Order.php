<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    public const STATUS_OPEN = 'open';
    public const STATUS_PAID = 'paid';
    public const STATUS_DONE = 'dispatched';

    protected $fillable = [
        'ordered_at',
        'ordered_by',
        'order_number',
        'status',
    ];

    protected $casts = [
        'ordered_at' => 'datetime',
        'status' => 'string',
    ];

    protected $appends = ['total_price'];

    public function getTotalPriceAttribute(): int
    {
        $total = 0;

        /** @var OrderLine $line */
        foreach ($this->orderLines() as $line) {
            $total += $line->total_price;
        }

        return $total;
    }

    public function orderLines(): HasMany
    {
        return $this->hasmany(OrderLine::class);
    }

    protected static function boot(): void
    {
        parent::boot();

        // auto-set our ordered_at field if it isn't explicitly set beforehand
        static::creating(function ($order) {
            if (!$order->ordered_at) {
                $order->ordered_at = now();
            }
        });
    }
}
