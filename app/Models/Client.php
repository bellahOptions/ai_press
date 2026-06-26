<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'email', 'phone', 'company', 'address',
        'lead_source', 'segment', 'notes', 'clv_kobo', 'assigned_to',
    ];

    public function assignedTo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function leads(): HasMany
    {
        return $this->hasMany(Lead::class);
    }

    public function communications(): HasMany
    {
        return $this->hasMany(Communication::class);
    }

    public function quotations(): HasMany
    {
        return $this->hasMany(Quotation::class);
    }

    public function jobOrders(): HasMany
    {
        return $this->hasMany(JobOrder::class);
    }

    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }

    public function deliveries(): HasMany
    {
        return $this->hasMany(Delivery::class);
    }

    // Formatted CLV in naira
    public function getClvNairaAttribute(): string
    {
        return '₦' . number_format($this->clv_kobo / 100, 2);
    }

    // Recalculate and store CLV from paid invoices
    public function recalculateClv(): void
    {
        $this->update([
            'clv_kobo' => $this->invoices()->where('status', 'paid')->sum('total_kobo'),
        ]);
    }
}
