<?php

namespace App\Livewire\Crm;

use App\Models\Client;
use App\Models\Lead;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Computed;

#[Layout('layouts.ops')]
class LeadList extends Component
{
    use WithPagination;

    public string $search = '';
    public string $status = '';
    public string $source = '';

    public function updatingSearch(): void { $this->resetPage(); }
    public function updatingStatus(): void { $this->resetPage(); }
    public function updatingSource(): void { $this->resetPage(); }

    #[Computed]
    public function leads()
    {
        return Lead::query()
            ->with('assignedTo')
            ->when($this->search, function ($q) {
                $q->where(function ($inner) {
                    $inner->where('name', 'like', '%' . $this->search . '%')
                          ->orWhere('email', 'like', '%' . $this->search . '%')
                          ->orWhere('lead_number', 'like', '%' . $this->search . '%')
                          ->orWhere('company', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->status, fn ($q) => $q->where('status', $this->status))
            ->when($this->source, fn ($q) => $q->where('source', $this->source))
            ->latest()
            ->paginate(15);
    }

    public function convertToClient(int $leadId): void
    {
        $lead = Lead::findOrFail($leadId);

        if ($lead->status === 'converted') {
            session()->flash('error', 'This lead has already been converted.');
            return;
        }

        $client = Client::create([
            'name'        => $lead->name,
            'email'       => $lead->email,
            'phone'       => $lead->phone,
            'company'     => $lead->company,
            'lead_source' => $lead->source,
            'segment'     => 'personal',
            'assigned_to' => $lead->assigned_to,
        ]);

        $lead->update([
            'status'    => 'converted',
            'client_id' => $client->id,
        ]);

        session()->flash('success', 'Lead converted to client successfully.');
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.crm.lead-list')
            ->title('Leads');
    }
}
