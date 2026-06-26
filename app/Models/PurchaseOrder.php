<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PurchaseOrder extends Model
{
    protected $fillable = [
        'ref_number', 'supplier_id', 'created_by', 'status',
        'total_kobo', 'notes', 'ordered_at', 'received_at',
    ];

    protected $casts = [
        'ordered_at'  => 'datetime',
        'received_at' => 'datetime',
    ];

    protected static function booted(): void
    {
        static::creating(function (self $po) {
            if (empty($po->ref_number)) {
                $year  = now()->format('Y');
                $count = self::whereYear('created_at', $year)->count() + 1;
                $po->ref_number = 'ALET/PO/' . $year . '/' . str_pad($count, 4, '0', STR_PAD_LEFT);
            }
        });
    }

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function items(): HasMany
    {
        return $this->hasMany(PurchaseOrderItem::class);
    }

    public function stockMovements(): HasMany
    {
        return $this->hasMany(StockMovement::class);
    }
}
