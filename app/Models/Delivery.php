<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Delivery extends Model
{
    protected $fillable = [
        'job_order_id', 'client_id', 'dispatch_officer_id', 'type', 'status',
        'recipient_name', 'recipient_phone', 'address',
        'scheduled_at', 'delivered_at', 'notes',
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
        'delivered_at' => 'datetime',
    ];

    public function jobOrder(): BelongsTo
    {
        return $this->belongsTo(JobOrder::class);
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function dispatchOfficer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'dispatch_officer_id');
    }

    public function proofs(): HasMany
    {
        return $this->hasMany(DeliveryProof::class);
    }

    public function markDelivered(int $staffId): void
    {
        $this->update(['status' => 'delivered', 'delivered_at' => now()]);
        $this->jobOrder->transitionTo('closed', $staffId, 'Delivery confirmed.');
    }
}
