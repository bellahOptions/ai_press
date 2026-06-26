<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Material extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'category_id', 'supplier_id', 'name', 'sku', 'unit',
        'unit_cost_kobo', 'current_stock', 'reorder_threshold',
        'description', 'active',
    ];

    protected $casts = [
        'unit_cost_kobo'    => 'integer',
        'current_stock'     => 'float',
        'reorder_threshold' => 'float',
        'active'            => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(MaterialCategory::class, 'category_id');
    }

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    public function stockMovements(): HasMany
    {
        return $this->hasMany(StockMovement::class);
    }

    public function isLowStock(): bool
    {
        return $this->current_stock <= $this->reorder_threshold;
    }

    public function getUnitCostNairaAttribute(): string
    {
        return '₦' . number_format($this->unit_cost_kobo / 100, 2);
    }

    // Deduct stock and record movement
    public function deductStock(float $quantity, int $jobOrderId, int $staffId, string $notes = ''): StockMovement
    {
        $after = $this->current_stock - $quantity;
        $this->decrement('current_stock', $quantity);

        return $this->stockMovements()->create([
            'type'          => 'stock_out',
            'quantity'      => -$quantity,
            'stock_after'   => $after,
            'unit_cost_kobo'=> $this->unit_cost_kobo,
            'job_order_id'  => $jobOrderId,
            'staff_id'      => $staffId,
            'notes'         => $notes,
        ]);
    }

    // Add stock and record movement
    public function addStock(float $quantity, int $staffId, ?int $purchaseOrderId = null, string $notes = ''): StockMovement
    {
        $after = $this->current_stock + $quantity;
        $this->increment('current_stock', $quantity);

        return $this->stockMovements()->create([
            'type'             => 'stock_in',
            'quantity'         => $quantity,
            'stock_after'      => $after,
            'unit_cost_kobo'   => $this->unit_cost_kobo,
            'purchase_order_id'=> $purchaseOrderId,
            'staff_id'         => $staffId,
            'notes'            => $notes,
        ]);
    }
}
