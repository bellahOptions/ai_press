<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuotationItem extends Model
{
    protected $fillable = [
        'quotation_id', 'description', 'unit', 'quantity',
        'unit_price_kobo', 'total_kobo', 'sort_order',
    ];

    protected static function booted(): void
    {
        $recalc = fn (self $item) => $item->quotation?->recalculate();

        static::saved($recalc);
        static::deleted($recalc);
    }

    public function quotation(): BelongsTo
    {
        return $this->belongsTo(Quotation::class);
    }
}
