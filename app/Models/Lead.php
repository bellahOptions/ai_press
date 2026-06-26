<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lead extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'lead_number', 'client_id', 'name', 'email', 'phone', 'company',
        'source', 'status', 'job_type', 'requirements', 'budget_range',
        'desired_date', 'assigned_to', 'notes',
    ];

    protected $casts = ['desired_date' => 'date'];

    protected static function booted(): void
    {
        static::creating(function (self $lead) {
            if (empty($lead->lead_number)) {
                $year  = now()->format('Y');
                $count = self::whereYear('created_at', $year)->count() + 1;
                $lead->lead_number = 'ALET/LEAD/' . $year . '/' . str_pad($count, 4, '0', STR_PAD_LEFT);
            }
        });
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function assignedTo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function communications(): HasMany
    {
        return $this->hasMany(Communication::class);
    }
}
