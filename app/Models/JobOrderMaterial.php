<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobOrderMaterial extends Model
{
    protected $fillable = [
        'job_order_id', 'material_id', 'quantity',
        'unit_cost_kobo', 'deducted', 'deducted_at',
    ];

    protected $casts = [
        'deducted'    => 'boolean',
        'deducted_at' => 'datetime',
    ];

    public function jobOrder(): BelongsTo
    {
        return $this->belongsTo(JobOrder::class);
    }

    public function material(): BelongsTo
    {
        return $this->belongsTo(Material::class);
    }
}
