<?php

namespace App\Livewire\Erm;

use App\Models\Supplier;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Computed;

#[Layout('layouts.ops')]
class SupplierList extends Component
{
    use WithPagination;

    public string $search = '';

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    #[Computed]
    public function suppliers()
    {
        return Supplier::withCount('materials')
            ->when($this->search, function ($q) {
                $q->where(function ($inner) {
                    $inner->where('name', 'like', '%' . $this->search . '%')
                          ->orWhere('email', 'like', '%' . $this->search . '%')
                          ->orWhere('contact_person', 'like', '%' . $this->search . '%');
                });
            })
            ->latest()
            ->paginate(15);
    }

    public function toggleActive(int $id): void
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->update(['active' => ! $supplier->active]);
        session()->flash('success', $supplier->name . ' status updated.');
    }

    public function render()
    {
        return view('livewire.erm.supplier-list')
            ->title('Suppliers');
    }
}
