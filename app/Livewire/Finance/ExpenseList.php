<?php

namespace App\Livewire\Finance;

use App\Models\Expense;
use App\Models\ExpenseCategory;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Computed;

#[Layout('layouts.ops')]
class ExpenseList extends Component
{
    use WithPagination;

    public string $search = '';
    public string $categoryId = '';
    public string $dateFrom = '';
    public string $dateTo = '';

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function updatingCategoryId(): void
    {
        $this->resetPage();
    }

    public function updatingDateFrom(): void
    {
        $this->resetPage();
    }

    public function updatingDateTo(): void
    {
        $this->resetPage();
    }

    #[Computed]
    public function expenses()
    {
        return Expense::query()
            ->with(['category', 'recordedBy'])
            ->when($this->search, function ($q) {
                $q->where(function ($inner) {
                    $inner->where('description', 'like', '%' . $this->search . '%')
                          ->orWhere('vendor', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->categoryId, fn ($q) => $q->where('category_id', $this->categoryId))
            ->when($this->dateFrom, fn ($q) => $q->whereDate('expense_date', '>=', $this->dateFrom))
            ->when($this->dateTo, fn ($q) => $q->whereDate('expense_date', '<=', $this->dateTo))
            ->latest('expense_date')
            ->paginate(15);
    }

    #[Computed]
    public function totalKobo(): int
    {
        return (int) Expense::query()
            ->when($this->search, function ($q) {
                $q->where(function ($inner) {
                    $inner->where('description', 'like', '%' . $this->search . '%')
                          ->orWhere('vendor', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->categoryId, fn ($q) => $q->where('category_id', $this->categoryId))
            ->when($this->dateFrom, fn ($q) => $q->whereDate('expense_date', '>=', $this->dateFrom))
            ->when($this->dateTo, fn ($q) => $q->whereDate('expense_date', '<=', $this->dateTo))
            ->sum('amount_kobo');
    }

    #[Computed]
    public function categories()
    {
        return ExpenseCategory::orderBy('name')->get();
    }

    public function deleteExpense(int $id): void
    {
        Expense::findOrFail($id)->delete();
        session()->flash('success', 'Expense deleted.');
    }

    public function render()
    {
        return view('livewire.finance.expense-list')
            ->title('Expenses');
    }
}
