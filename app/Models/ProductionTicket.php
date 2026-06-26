<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductionTicket extends Model
{
    protected $fillable = [
        'job_order_id', 'current_stage', 'assigned_to', 'machine_id',
        'stage_started_at', 'completed_at', 'proof_file', 'client_proof_approved', 'notes',
    ];

    protected $casts = [
        'stage_started_at'       => 'datetime',
        'completed_at'           => 'datetime',
        'client_proof_approved'  => 'boolean',
    ];

    public function jobOrder(): BelongsTo
    {
        return $this->belongsTo(JobOrder::class);
    }

    public function assignedTo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function machine(): BelongsTo
    {
        return $this->belongsTo(Machine::class);
    }
}
