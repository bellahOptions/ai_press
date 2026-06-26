<?php

namespace App\Livewire\Finance;

use App\Models\Client;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\JobOrder;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Computed;

#[Layout('layouts.ops')]
class InvoiceForm extends Component
{
    public ?int $invoiceId = null;

    public string $clientId = '';
    public string $jobOrderId = '';
    public string $dueDate = '';
    public float $vatPercent = 0;
    public int $discountKobo = 0;
    public string $notes = '';
    public string $paymentInstructions = '';
    public int $advancePaidKobo = 0;

    /** @var array<int, array{description: string, unit: string, quantity: string, unit_price_kobo: string}> */
    public array $items = [];

    public function mount(?int $invoiceId = null): void
    {
        $this->invoiceId = $invoiceId;

        if ($invoiceId) {
            $invoice = Invoice::with('items')->findOrFail($invoiceId);
            $this->clientId           = (string) $invoice->client_id;
            $this->jobOrderId         = (string) ($invoice->job_order_id ?? '');
            $this->dueDate            = $invoice->due_date?->format('Y-m-d') ?? '';
            $this->vatPercent         = $invoice->vat_percent;
            $this->discountKobo       = $invoice->discount_kobo;
            $this->notes              = $invoice->notes ?? '';
            $this->paymentInstructions= $invoice->payment_instructions ?? '';
            $this->advancePaidKobo    = $invoice->advance_paid_kobo;

            $this->items = $invoice->items->map(fn ($item) => [
                'description'    => $item->description,
                'unit'           => $item->unit,
                'quantity'       => (string) $item->quantity,
                'unit_price_kobo'=> (string) $item->unit_price_kobo,
            ])->toArray();
        }

        if (empty($this->items)) {
            $this->addItem();
        }
    }

    #[Computed]
    public function clients()
    {
        return Client::orderBy('name')->get(['id', 'name']);
    }

    #[Computed]
    public function jobOrders()
    {
        if (! $this->clientId) {
            return collect();
        }

        return JobOrder::where('client_id', $this->clientId)
            ->whereNotIn('status', ['cancelled', 'closed'])
            ->orderByDesc('created_at')
            ->get(['id', 'job_number', 'status']);
    }

    public function updatingClientId(): void
    {
        $this->jobOrderId = '';
    }

    public function addItem(): void
    {
        $this->items[] = [
            'description'     => '',
            'unit'            => 'pcs',
            'quantity'        => '1',
            'unit_price_kobo' => '0',
        ];
    }

    public function removeItem(int $index): void
    {
        unset($this->items[$index]);
        $this->items = array_values($this->items);
    }

    public function getSubtotalKobo(): int
    {
        return (int) collect($this->items)->sum(function ($item) {
            return (float) ($item['quantity'] ?? 0) * (float) ($item['unit_price_kobo'] ?? 0);
        });
    }

    public function getVatKobo(): int
    {
        return (int) round($this->getSubtotalKobo() * $this->vatPercent / 100);
    }

    public function getTotalKobo(): int
    {
        return $this->getSubtotalKobo() - $this->discountKobo + $this->getVatKobo();
    }

    public function save(): void
    {
        $this->validate([
            'clientId'             => 'required|exists:clients,id',
            'jobOrderId'           => 'nullable|exists:job_orders,id',
            'dueDate'              => 'nullable|date',
            'vatPercent'           => 'required|numeric|min:0|max:100',
            'discountKobo'         => 'required|integer|min:0',
            'advancePaidKobo'      => 'required|integer|min:0',
            'notes'                => 'nullable|string',
            'paymentInstructions'  => 'nullable|string',
            'items'                => 'required|array|min:1',
            'items.*.description'  => 'required|string|max:255',
            'items.*.unit'         => 'required|string|max:50',
            'items.*.quantity'     => 'required|numeric|min:0.001',
            'items.*.unit_price_kobo' => 'required|numeric|min:0',
        ]);

        $subtotal = $this->getSubtotalKobo();
        $vatKobo  = $this->getVatKobo();
        $total    = $this->getTotalKobo();

        if ($this->invoiceId) {
            $invoice = Invoice::findOrFail($this->invoiceId);
            $invoice->update([
                'client_id'            => $this->clientId,
                'job_order_id'         => $this->jobOrderId ?: null,
                'due_date'             => $this->dueDate ?: null,
                'vat_percent'          => $this->vatPercent,
                'discount_kobo'        => $this->discountKobo,
                'advance_paid_kobo'    => $this->advancePaidKobo,
                'notes'                => $this->notes,
                'payment_instructions' => $this->paymentInstructions,
            ]);
            $invoice->items()->delete();
        } else {
            $invoice = Invoice::create([
                'client_id'            => $this->clientId,
                'job_order_id'         => $this->jobOrderId ?: null,
                'created_by'           => auth()->id(),
                'due_date'             => $this->dueDate ?: null,
                'vat_percent'          => $this->vatPercent,
                'discount_kobo'        => $this->discountKobo,
                'advance_paid_kobo'    => $this->advancePaidKobo,
                'notes'                => $this->notes,
                'payment_instructions' => $this->paymentInstructions,
                'subtotal_kobo'        => $subtotal,
                'vat_kobo'             => $vatKobo,
                'total_kobo'           => $total,
                'status'               => 'draft',
            ]);
        }

        foreach ($this->items as $sortOrder => $row) {
            $lineTotal = (int) round((float) $row['quantity'] * (float) $row['unit_price_kobo']);
            InvoiceItem::create([
                'invoice_id'      => $invoice->id,
                'description'     => $row['description'],
                'unit'            => $row['unit'],
                'quantity'        => $row['quantity'],
                'unit_price_kobo' => (int) $row['unit_price_kobo'],
                'total_kobo'      => $lineTotal,
                'sort_order'      => $sortOrder,
            ]);
        }

        $invoice->recalculate();

        session()->flash('success', 'Invoice ' . $invoice->invoice_number . ' saved.');
        $this->redirect(route('ops.invoices.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.finance.invoice-form')
            ->title($this->invoiceId ? 'Edit Invoice' : 'New Invoice');
    }
}
