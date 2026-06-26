<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class JobOrder extends Model
{
    use SoftDeletes;

    // Production stages in order
    public const STAGES = [
        'pending_advance',
        'in_design',
        'material_allocation',
        'printing',
        'finishing',
        'qc',
        'ready',
        'dispatched',
        'closed',
        'cancelled',
    ];

    protected $fillable = [
        'job_number', 'quotation_id', 'client_id', 'created_by', 'assigned_to',
        'status', 'advance_paid_kobo', 'advance_percent', 'due_date',
        'job_type', 'specs', 'notes',
        'dispatch_override', 'dispatch_override_reason', 'dispatch_override_by',
    ];

    protected $casts = [
        'due_date'         => 'date',
        'dispatch_override'=> 'boolean',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function quotation(): BelongsTo
    {
        return $this->belongsTo(Quotation::class);
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function assignedTo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function productionTicket(): HasOne
    {
        return $this->hasOne(ProductionTicket::class);
    }

    public function productionLogs(): HasMany
    {
        return $this->hasMany(ProductionLog::class)->latest('transitioned_at');
    }

    public function materials(): HasMany
    {
        return $this->hasMany(JobOrderMaterial::class);
    }

    public function machineBookings(): HasMany
    {
        return $this->hasMany(MachineBooking::class);
    }

    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }

    public function deliveries(): HasMany
    {
        return $this->hasMany(Delivery::class);
    }

    public function expenses(): HasMany
    {
        return $this->hasMany(Expense::class);
    }

    // Total material cost in kobo
    public function getMaterialCostKoboAttribute(): int
    {
        return (int) $this->materials()->selectRaw('SUM(quantity * unit_cost_kobo) as total')->value('total');
    }

    // Total invoiced amount
    public function getInvoicedKoboAttribute(): int
    {
        return (int) $this->invoices()->where('status', '!=', 'cancelled')->sum('total_kobo');
    }

    // Total paid against invoices
    public function getPaidKoboAttribute(): int
    {
        return (int) $this->invoices()
            ->with('payments')
            ->get()
            ->flatMap->payments
            ->sum('amount_kobo');
    }

    public function canDispatch(): bool
    {
        if ($this->dispatch_override) {
            return true;
        }
        return $this->paid_kobo >= $this->invoiced_kobo;
    }

    // Advance required in kobo based on invoice total
    public function advanceRequiredKobo(): int
    {
        $total = (int) $this->invoices()->sum('total_kobo');
        return (int) round($total * $this->advance_percent / 100);
    }

    public function advanceSatisfied(): bool
    {
        return $this->advance_paid_kobo >= $this->advanceRequiredKobo();
    }

    // Transition to next stage and log it
    public function transitionTo(string $stage, int $staffId, string $notes = ''): void
    {
        $from = $this->status;

        $this->update(['status' => $stage]);

        $ticket = $this->productionTicket;
        if ($ticket) {
            $ticket->update(['current_stage' => $stage, 'stage_started_at' => now()]);
        }

        ProductionLog::create([
            'production_ticket_id' => $ticket?->id ?? 0,
            'job_order_id'         => $this->id,
            'staff_id'             => $staffId,
            'from_stage'           => $from,
            'to_stage'             => $stage,
            'notes'                => $notes,
        ]);
    }
}
