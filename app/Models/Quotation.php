<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Quotation extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'ref_number', 'client_id', 'lead_id', 'created_by',
        'subtotal_kobo', 'discount_kobo', 'vat_percent', 'vat_kobo', 'total_kobo',
        'status', 'valid_until', 'terms', 'notes', 'sent_at', 'accepted_at',
    ];

    protected $casts = [
        'valid_until'  => 'date',
        'sent_at'      => 'datetime',
        'accepted_at'  => 'datetime',
    ];

    protected static function booted(): void
    {
        static::creating(function (self $q) {
            if (empty($q->ref_number)) {
                $year  = now()->format('Y');
                $count = self::whereYear('created_at', $year)->count() + 1;
                $q->ref_number = 'ALET/QT/' . $year . '/' . str_pad($count, 4, '0', STR_PAD_LEFT);
            }
        });
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function lead(): BelongsTo
    {
        return $this->belongsTo(Lead::class);
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function items(): HasMany
    {
        return $this->hasMany(QuotationItem::class)->orderBy('sort_order');
    }

    public function jobOrder(): HasOne
    {
        return $this->hasOne(JobOrder::class);
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

    public function getTotalNairaAttribute(): string
    {
        return '₦' . number_format($this->total_kobo / 100, 2);
    }

    // Convert approved quotation to job order
    public function convertToJobOrder(int $createdBy): JobOrder
    {
        $year  = now()->format('Y');
        $count = JobOrder::whereYear('created_at', $year)->count() + 1;

        $job = JobOrder::create([
            'job_number'     => 'ALET/JOB/' . $year . '/' . str_pad($count, 4, '0', STR_PAD_LEFT),
            'quotation_id'   => $this->id,
            'client_id'      => $this->client_id,
            'created_by'     => $createdBy,
            'status'         => 'pending_advance',
        ]);

        $this->update(['status' => 'accepted', 'accepted_at' => now()]);

        return $job;
    }
}
