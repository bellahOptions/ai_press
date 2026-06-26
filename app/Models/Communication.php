<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Communication extends Model
{
    protected $fillable = [
        'client_id', 'lead_id', 'type', 'direction',
        'subject', 'notes', 'staff_id', 'communicated_at',
    ];

    protected $casts = ['communicated_at' => 'datetime'];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function lead(): BelongsTo
    {
        return $this->belongsTo(Lead::class);
    }

    public function staff(): BelongsTo
    {
        return $this->belongsTo(User::class, 'staff_id');
    }
}
