<?php

namespace App\Livewire\Orm;

use App\Models\JobOrder;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Computed;

#[Layout('layouts.ops')]
class JobOrderList extends Component
{
    use WithPagination;

    public string $search = '';
    public string $status = '';

    public function updatingSearch(): void { $this->resetPage(); }
    public function updatingStatus(): void { $this->resetPage(); }

    #[Computed]
    public function jobOrders()
    {
        return JobOrder::query()
            ->with(['client', 'assignedTo'])
            ->when($this->search, function ($q) {
                $q->where(function ($inner) {
                    $inner->where('job_number', 'like', '%' . $this->search . '%')
                          ->orWhereHas('client', fn ($c) => $c->where('name', 'like', '%' . $this->search . '%'));
                });
            })
            ->when($this->status, fn ($q) => $q->where('status', $this->status))
            ->latest()
            ->paginate(15);
    }

    #[Computed]
    public function stageCounts(): array
    {
        return JobOrder::query()
            ->selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();
    }

    public function render()
    {
        return view('livewire.orm.job-order-list')
            ->title('Job Orders');
    }
}
