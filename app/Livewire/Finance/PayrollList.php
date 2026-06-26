<?php

namespace App\Livewire\Finance;

use App\Models\Payroll;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Computed;

#[Layout('layouts.ops')]
class PayrollList extends Component
{
    use WithPagination;

    public string $search = '';
    public string $year = '';

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function updatingYear(): void
    {
        $this->resetPage();
    }

    #[Computed]
    public function payrolls()
    {
        return Payroll::query()
            ->with('user')
            ->when($this->search, function ($q) {
                $q->whereHas('user', fn ($u) => $u->where('name', 'like', '%' . $this->search . '%'));
            })
            ->when($this->year, fn ($q) => $q->whereYear('period_start', $this->year))
            ->latest('period_start')
            ->paginate(15);
    }

    public function markPaid(int $id): void
    {
        $payroll = Payroll::findOrFail($id);
        $payroll->update(['paid' => true, 'paid_at' => now()]);
        session()->flash('success', 'Payroll marked as paid.');
    }

    public function render()
    {
        return view('livewire.finance.payroll-list')
            ->title('Payroll');
    }
}
