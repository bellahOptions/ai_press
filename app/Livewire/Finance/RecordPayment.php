<?php

namespace App\Livewire\Finance;

use App\Models\Invoice;
use App\Models\Payment;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.ops')]
class RecordPayment extends Component
{
    public Invoice $invoice;

    public string $amount = '';
    public string $method = 'bank_transfer';
    public string $reference = '';
    public string $notes = '';
    public string $paidAt = '';

    public function mount(int $invoiceId): void
    {
        $this->invoice = Invoice::with('client')->findOrFail($invoiceId);
        $this->paidAt  = now()->format('Y-m-d');
    }

    public function save(): void
    {
        $this->validate([
            'amount'    => 'required|numeric|min:1',
            'method'    => 'required|in:cash,bank_transfer,pos,paystack,flutterwave,cheque,other',
            'reference' => 'nullable|string|max:255',
            'notes'     => 'nullable|string|max:500',
            'paidAt'    => 'required|date',
        ]);

        Payment::create([
            'invoice_id'  => $this->invoice->id,
            'amount_kobo' => (int) round((float) $this->amount * 100),
            'method'      => $this->method,
            'reference'   => $this->reference ?: null,
            'notes'       => $this->notes ?: null,
            'recorded_by' => auth()->id(),
            'paid_at'     => $this->paidAt,
        ]);

        $this->invoice->refresh();
        $this->invoice->syncStatus();

        session()->flash('success', 'Payment recorded for invoice ' . $this->invoice->invoice_number . '.');
        $this->redirect(route('ops.invoices.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.finance.record-payment')
            ->title('Record Payment – ' . $this->invoice->invoice_number);
    }
}
