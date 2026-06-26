<?php

namespace App\Livewire\Erm;

use App\Models\Material;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.ops')]
class StockAdjustment extends Component
{
    public Material $material;

    public string $type = 'stock_in';
    public ?float $quantity = null;
    public string $notes = '';

    public function mount(int $materialId): void
    {
        $this->material = Material::findOrFail($materialId);
    }

    public function save(): void
    {
        $this->validate([
            'type'     => 'required|in:stock_in,stock_out,adjustment',
            'quantity' => 'required|numeric|min:0.001',
            'notes'    => 'nullable|string|max:500',
        ]);

        if ($this->type === 'stock_in') {
            $this->material->addStock(
                $this->quantity,
                auth()->id(),
                null,
                $this->notes
            );
        } else {
            // stock_out or adjustment
            $this->material->deductStock(
                $this->quantity,
                0,
                auth()->id(),
                $this->notes
            );
        }

        session()->flash('success', 'Stock adjustment recorded for ' . $this->material->name . '.');
        $this->redirect(route('ops.inventory.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.erm.stock-adjustment')
            ->title('Stock Adjustment – ' . $this->material->name);
    }
}
