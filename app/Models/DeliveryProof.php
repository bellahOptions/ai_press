<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DeliveryProof extends Model
{
    protected $fillable = ['delivery_id', 'type', 'file_path', 'notes'];

    public function delivery(): BelongsTo
    {
        return $this->belongsTo(Delivery::class);
    }
}
