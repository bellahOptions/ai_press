<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invoice extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'invoice_number', 'job_order_id', 'client_id', 'created_by',
        'subtotal_kobo', 'discount_kobo', 'vat_percent', 'vat_kobo', 'total_kobo',
        'advance_paid_kobo', 'status', 'due_date', 'notes', 'payment_instructions',
        'sent_at', 'paid_at',
    ];

    protected $casts = [
        'due_date'  => 'date',
        'sent_at'   => 'datetime',
        'paid_at'   => 'datetime',
    ];

    protected static function booted(): void
    {
        static::creating(function (self $inv) {
            if (empty($inv->invoice_number)) {
                $year  = now()->format('Y');
                $count = self::whereYear('created_at', $year)->count() + 1;
                $inv->invoice_number = 'ALET/INV/' . $year . '/' . str_pad($count, 4, '0', STR_PAD_LEFT);
            }
        });
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function jobOrder(): BelongsTo
    {
        return $this->belongsTo(JobOrder::class);
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function items(): HasMany
    {
        return $this->hasMany(InvoiceItem::class)->orderBy('sort_order');
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class)->latest('paid_at');
    }

    // Computed balance (never stored, avoids drift)
    public function getBalanceKoboAttribute(): int
    {
        $paid = $this->payments()->sum('amount_kobo');
        return max(0, $this->total_kobo - $this->advance_paid_kobo - (int) $paid);
    }

    public function getTotalNairaAttribute(): string
    {
        return '₦' . number_format($this->total_kobo / 100, 2);
    }

    public function getBalanceNairaAttribute(): string
    {
        return '₦' . number_format($this->balance_kobo / 100, 2);
    }

    public function recalculate(): void
    {
        $subtotal = $this->items()->sum('total_kobo');
        $vat      = (int) round($subtotal * $this->vat_percent / 100);
        $this->update([
            'subtotal_kobo' => $subtotal,
            'vat_kobo'      => $vat,
            'total_kobo'    => $subtotal - $this->discount_kobo + $vat,
        ]);
    }

    public function syncStatus(): void
    {
        $balance = $this->balance_kobo;
        if ($balance <= 0) {
            $this->update(['status' => 'paid', 'paid_at' => now()]);
        } elseif ($this->payments()->count() > 0) {
            $this->update(['status' => 'partial']);
        }
    }
}
