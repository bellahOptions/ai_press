<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payroll extends Model
{
    protected $table = 'payroll';

    protected $fillable = [
        'user_id', 'created_by', 'period_start', 'period_end',
        'gross_kobo', 'deductions_kobo', 'net_kobo', 'paid', 'paid_at', 'notes',
    ];

    protected $casts = [
        'period_start' => 'date',
        'period_end'   => 'date',
        'paid'         => 'boolean',
        'paid_at'      => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getNetNairaAttribute(): string
    {
        return '₦' . number_format($this->net_kobo / 100, 2);
    }
}
