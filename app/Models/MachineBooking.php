<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MachineBooking extends Model
{
    protected $fillable = ['machine_id', 'job_order_id', 'starts_at', 'ends_at', 'notes'];

    protected $casts = [
        'starts_at' => 'datetime',
        'ends_at'   => 'datetime',
    ];

    public function machine(): BelongsTo
    {
        return $this->belongsTo(Machine::class);
    }

    public function jobOrder(): BelongsTo
    {
        return $this->belongsTo(JobOrder::class);
    }
}
