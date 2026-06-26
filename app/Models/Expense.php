<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Expense extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'category_id', 'job_order_id', 'recorded_by', 'description',
        'amount_kobo', 'vendor', 'receipt_path', 'expense_date', 'notes',
    ];

    protected $casts = ['expense_date' => 'date'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(ExpenseCategory::class, 'category_id');
    }

    public function jobOrder(): BelongsTo
    {
        return $this->belongsTo(JobOrder::class);
    }

    public function recordedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'recorded_by');
    }

    public function getAmountNairaAttribute(): string
    {
        return '₦' . number_format($this->amount_kobo / 100, 2);
    }
}
