<div>
    @php
    $statusColors = [
        'new'       => 'bg-gray-100 text-gray-700',
        'contacted' => 'bg-blue-100 text-blue-700',
        'qualified' => 'bg-yellow-100 text-yellow-700',
        'quoted'    => 'bg-purple-100 text-purple-700',
        'converted' => 'bg-green-100 text-green-700',
        'lost'      => 'bg-red-100 text-red-700',
    ];
    @endphp

    {{-- Page header --}}
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-xl font-bold text-gray-900">Leads</h2>
            <p class="text-sm text-gray-500 mt-0.5">Track and convert sales leads</p>
        </div>
    </div>

    {{-- Filters --}}
    <div class="bg-white rounded-2xl shadow-md p-4 mb-4 flex flex-col sm:flex-row gap-3">
        <div class="relative flex-1">
            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z"/>
            </svg>
            <input wire:model.live.debounce.400ms="search"
                   type="text"
                   placeholder="Search lead #, name, company…"
                   class="w-full pl-9 pr-4 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"/>
        </div>
        <select wire:model.live="status"
                class="text-sm border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 bg-white">
            <option value="">All Statuses</option>
            <option value="new">New</option>
            <option value="contacted">Contacted</option>
            <option value="qualified">Qualified</option>
            <option value="quoted">Quoted</option>
            <option value="converted">Converted</option>
            <option value="lost">Lost</option>
        </select>
        <select wire:model.live="source"
                class="text-sm border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 bg-white">
            <option value="">All Sources</option>
            <option value="walk_in">Walk-in</option>
            <option value="referral">Referral</option>
            <option value="instagram">Instagram</option>
            <option value="facebook">Facebook</option>
            <option value="google">Google</option>
            <option value="website">Website</option>
            <option value="whatsapp">WhatsApp</option>
            <option value="other">Other</option>
        </select>
    </div>

    {{-- Table --}}
    <div class="bg-white rounded-2xl shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100">
                        <th class="text-left px-4 py-3 font-semibold text-gray-600">Lead #</th>
                        <th class="text-left px-4 py-3 font-semibold text-gray-600">Name</th>
                        <th class="text-left px-4 py-3 font-semibold text-gray-600">Source</th>
                        <th class="text-left px-4 py-3 font-semibold text-gray-600">Status</th>
                        <th class="text-left px-4 py-3 font-semibold text-gray-600">Job Type</th>
                        <th class="text-left px-4 py-3 font-semibold text-gray-600">Assigned To</th>
                        <th class="text-right px-4 py-3 font-semibold text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($this->leads as $lead)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-4 py-3 font-mono text-xs text-gray-500">{{ $lead->lead_number }}</td>
                        <td class="px-4 py-3">
                            <div class="font-medium text-gray-900">{{ $lead->name }}</div>
                            @if($lead->company)
                                <div class="text-xs text-gray-400">{{ $lead->company }}</div>
                            @endif
                        </td>
                        <td class="px-4 py-3 capitalize text-gray-600">{{ str_replace('_', ' ', $lead->source) }}</td>
                        <td class="px-4 py-3">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium capitalize {{ $statusColors[$lead->status] ?? 'bg-gray-100 text-gray-700' }}">
                                {{ str_replace('_', ' ', $lead->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-gray-600">{{ $lead->job_type ?: '—' }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ $lead->assignedTo?->firstName ?? '—' }}</td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-end gap-2">
                                @if($lead->status !== 'converted')
                                <button wire:click="convertToClient({{ $lead->id }})"
                                        wire:confirm="Convert {{ $lead->name }} to a client?"
                                        class="text-xs font-medium text-green-600 hover:text-green-800 px-2 py-1 rounded-lg hover:bg-green-50 transition whitespace-nowrap">
                                    Convert
                                </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-4 py-12 text-center text-gray-400">
                            <svg class="w-10 h-10 mx-auto mb-2 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                            No leads found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($this->leads->hasPages())
        <div class="px-4 py-3 border-t border-gray-100">
            {{ $this->leads->links() }}
        </div>
        @endif
    </div>
</div>
