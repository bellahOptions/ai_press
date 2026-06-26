<?php

namespace App\Livewire\Crm;

use App\Models\Client;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.ops')]
class ClientForm extends Component
{
    public ?int $clientId = null;

    public string $name      = '';
    public string $email     = '';
    public string $phone     = '';
    public string $company   = '';
    public string $address   = '';
    public string $lead_source = 'walk_in';
    public string $segment   = 'personal';
    public string $notes     = '';

    public function mount(?int $clientId = null): void
    {
        $this->clientId = $clientId;

        if ($clientId) {
            $client = Client::findOrFail($clientId);
            $this->name        = $client->name ?? '';
            $this->email       = $client->email ?? '';
            $this->phone       = $client->phone ?? '';
            $this->company     = $client->company ?? '';
            $this->address     = $client->address ?? '';
            $this->lead_source = $client->lead_source ?? 'walk_in';
            $this->segment     = $client->segment ?? 'personal';
            $this->notes       = $client->notes ?? '';
        }
    }

    public function save(): void
    {
        $validated = $this->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'nullable|email|max:255',
            'phone'       => 'nullable|string|max:50',
            'company'     => 'nullable|string|max:255',
            'address'     => 'nullable|string|max:1000',
            'lead_source' => 'required|string',
            'segment'     => 'required|string',
            'notes'       => 'nullable|string',
        ]);

        if ($this->clientId) {
            Client::findOrFail($this->clientId)->update($validated);
            session()->flash('success', 'Client updated successfully.');
        } else {
            Client::create($validated);
            session()->flash('success', 'Client created successfully.');
        }

        $this->redirect(route('ops.clients.index'), navigate: true);
    }

    public function render()
    {
        $title = $this->clientId ? 'Edit Client' : 'New Client';
        return view('livewire.crm.client-form')
            ->title($title);
    }
}
