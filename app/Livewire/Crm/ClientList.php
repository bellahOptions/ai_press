<?php

namespace App\Livewire\Crm;

use App\Models\Client;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Computed;

#[Layout('layouts.ops')]
class ClientList extends Component
{
    use WithPagination;

    public string $search = '';
    public string $segment = '';
    public int $perPage = 15;

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function updatingSegment(): void
    {
        $this->resetPage();
    }

    #[Computed]
    public function clients()
    {
        return Client::query()
            ->when($this->search, function ($q) {
                $q->where(function ($inner) {
                    $inner->where('name', 'like', '%' . $this->search . '%')
                          ->orWhere('email', 'like', '%' . $this->search . '%')
                          ->orWhere('phone', 'like', '%' . $this->search . '%')
                          ->orWhere('company', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->segment, fn ($q) => $q->where('segment', $this->segment))
            ->latest()
            ->paginate($this->perPage);
    }

    public function deleteClient(int $id): void
    {
        $client = Client::findOrFail($id);

        if ($client->jobOrders()->exists()) {
            session()->flash('error', 'Cannot delete a client with existing job orders.');
            return;
        }

        $client->delete();
        session()->flash('success', 'Client deleted successfully.');
    }

    public function render()
    {
        return view('livewire.crm.client-list')
            ->title('Clients');
    }
}
