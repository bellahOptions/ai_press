<?php

namespace App\Livewire\Finance;

use App\Models\Invoice;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Computed;

#[Layout('layouts.ops')]
class InvoiceList extends Component
{
    use WithPagination;

    public string $search = '';
    public string $status = '';

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function updatingStatus(): void
    {
        $this->resetPage();
    }

    #[Computed]
    public function invoices()
    {
        return Invoice::query()
            ->with(['client'])
            ->when($this->search, function ($q) {
                $q->where(function ($inner) {
                    $inner->where('invoice_number', 'like', '%' . $this->search . '%')
                          ->orWhereHas('client', fn ($c) => $c->where('name', 'like', '%' . $this->search . '%'));
                });
            })
            ->when($this->status, fn ($q) => $q->where('status', $this->status))
            ->latest()
            ->paginate(15);
    }

    public function render()
    {
        return view('livewire.finance.invoice-list')
            ->title('Invoices');
    }
}
