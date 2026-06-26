<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductionLog extends Model
{
    protected $fillable = [
        'production_ticket_id', 'job_order_id', 'staff_id',
        'from_stage', 'to_stage', 'notes', 'transitioned_at',
    ];

    protected $casts = ['transitioned_at' => 'datetime'];

    public function productionTicket(): BelongsTo
    {
        return $this->belongsTo(ProductionTicket::class);
    }

    public function jobOrder(): BelongsTo
    {
        return $this->belongsTo(JobOrder::class);
    }

    public function staff(): BelongsTo
    {
        return $this->belongsTo(User::class, 'staff_id');
    }
}
