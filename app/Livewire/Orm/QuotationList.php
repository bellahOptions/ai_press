<?php

namespace App\Livewire\Orm;

use App\Models\Quotation;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Computed;

#[Layout('layouts.ops')]
class QuotationList extends Component
{
    use WithPagination;

    public string $search = '';
    public string $status = '';

    public function updatingSearch(): void { $this->resetPage(); }
    public function updatingStatus(): void { $this->resetPage(); }

    #[Computed]
    public function quotations()
    {
        return Quotation::query()
            ->with('client')
            ->when($this->search, function ($q) {
                $q->where(function ($inner) {
                    $inner->where('ref_number', 'like', '%' . $this->search . '%')
                          ->orWhereHas('client', fn ($c) => $c->where('name', 'like', '%' . $this->search . '%'));
                });
            })
            ->when($this->status, fn ($q) => $q->where('status', $this->status))
            ->latest()
            ->paginate(15);
    }

    public function convertToJob(int $quotationId): void
    {
        $quotation = Quotation::findOrFail($quotationId);

        if ($quotation->jobOrder()->exists()) {
            session()->flash('error', 'A job order already exists for this quotation.');
            return;
        }

        $quotation->convertToJobOrder(auth()->id());

        session()->flash('success', 'Job order created successfully.');
        $this->redirect(route('ops.jobs.index'), navigate: true);
    }

    public function deleteQuotation(int $id): void
    {
        $quotation = Quotation::findOrFail($id);

        if ($quotation->jobOrder()->exists()) {
            session()->flash('error', 'Cannot delete a quotation that has an associated job order.');
            return;
        }

        $quotation->delete();
        session()->flash('success', 'Quotation deleted.');
    }

    public function render()
    {
        return view('livewire.orm.quotation-list')
            ->title('Quotations');
    }
}
