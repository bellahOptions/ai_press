<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    protected $fillable = [
        'invoice_id', 'amount_kobo', 'method', 'reference',
        'notes', 'recorded_by', 'paid_at',
    ];

    protected $casts = ['paid_at' => 'datetime'];

    protected static function booted(): void
    {
        static::saved(fn (self $p) => $p->invoice->syncStatus());
        static::deleted(fn (self $p) => $p->invoice->syncStatus());
    }

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }

    public function recordedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'recorded_by');
    }

    public function getAmountNairaAttribute(): string
    {
        return '₦' . number_format($this->amount_kobo / 100, 2);
    }
}
