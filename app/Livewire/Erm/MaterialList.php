<?php

namespace App\Livewire\Erm;

use App\Models\Material;
use App\Models\MaterialCategory;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Computed;

#[Layout('layouts.ops')]
class MaterialList extends Component
{
    use WithPagination;

    public string $search = '';
    public string $categoryId = '';
    public bool $showLowStockOnly = false;

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function updatingCategoryId(): void
    {
        $this->resetPage();
    }

    public function updatingShowLowStockOnly(): void
    {
        $this->resetPage();
    }

    #[Computed]
    public function materials()
    {
        return Material::query()
            ->with(['category', 'supplier'])
            ->when($this->search, function ($q) {
                $q->where(function ($inner) {
                    $inner->where('name', 'like', '%' . $this->search . '%')
                          ->orWhere('sku', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->categoryId, fn ($q) => $q->where('category_id', $this->categoryId))
            ->when($this->showLowStockOnly, fn ($q) => $q->whereColumn('current_stock', '<=', 'reorder_threshold'))
            ->latest()
            ->paginate(15);
    }

    #[Computed]
    public function categories()
    {
        return MaterialCategory::orderBy('name')->get();
    }

    public function deleteMaterial(int $id): void
    {
        $material = Material::findOrFail($id);

        if ($material->stockMovements()->exists()) {
            session()->flash('error', 'Cannot delete material with existing stock movements.');
            return;
        }

        $material->delete();
        session()->flash('success', 'Material deleted successfully.');
    }

    public function render()
    {
        return view('livewire.erm.material-list')
            ->title('Materials');
    }
}
