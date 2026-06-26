<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StockMovement extends Model
{
    protected $fillable = [
        'material_id', 'type', 'quantity', 'stock_after',
        'unit_cost_kobo', 'job_order_id', 'purchase_order_id', 'staff_id', 'notes',
    ];

    public function material(): BelongsTo
    {
        return $this->belongsTo(Material::class);
    }

    public function jobOrder(): BelongsTo
    {
        return $this->belongsTo(JobOrder::class);
    }

    public function purchaseOrder(): BelongsTo
    {
        return $this->belongsTo(PurchaseOrder::class);
    }

    public function staff(): BelongsTo
    {
        return $this->belongsTo(User::class, 'staff_id');
    }
}
