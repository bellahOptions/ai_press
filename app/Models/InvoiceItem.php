<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InvoiceItem extends Model
{
    protected $fillable = [
        'invoice_id', 'description', 'unit', 'quantity',
        'unit_price_kobo', 'total_kobo', 'sort_order',
    ];

    protected static function booted(): void
    {
        $recalc = fn (self $item) => $item->invoice?->recalculate();
        static::saved($recalc);
        static::deleted($recalc);
    }

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }
}
