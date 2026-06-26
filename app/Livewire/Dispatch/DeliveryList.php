<?php

namespace App\Livewire\Dispatch;

use App\Models\Delivery;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Computed;

#[Layout('layouts.ops')]
class DeliveryList extends Component
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
    public function deliveries()
    {
        return Delivery::query()
            ->with(['jobOrder.client'])
            ->when($this->search, function ($q) {
                $q->where(function ($inner) {
                    $inner->where('recipient_name', 'like', '%' . $this->search . '%')
                          ->orWhereHas('jobOrder', fn ($j) => $j->where('job_number', 'like', '%' . $this->search . '%'))
                          ->orWhereHas('jobOrder.client', fn ($c) => $c->where('name', 'like', '%' . $this->search . '%'));
                });
            })
            ->when($this->status, fn ($q) => $q->where('status', $this->status))
            ->latest('scheduled_at')
            ->paginate(15);
    }

    public function markDelivered(int $id): void
    {
        $delivery = Delivery::findOrFail($id);
        $delivery->markDelivered(auth()->id());
        session()->flash('success', 'Delivery marked as delivered.');
        $this->redirect(route('ops.dispatch.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.dispatch.delivery-list')
            ->title('Deliveries');
    }
}
