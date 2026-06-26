<div>
    @php
    $statusColors = [
        'draft'    => 'bg-gray-100 text-gray-700',
        'sent'     => 'bg-blue-100 text-blue-700',
        'accepted' => 'bg-green-100 text-green-700',
        'rejected' => 'bg-red-100 text-red-700',
        'expired'  => 'bg-amber-100 text-amber-700',
    ];
    @endphp

    {{-- Page header --}}
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-xl font-bold text-gray-900">Quotations</h2>
            <p class="text-sm text-gray-500 mt-0.5">Manage client quotations and convert to jobs</p>
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
                   placeholder="Search ref # or client name…"
                   class="w-full pl-9 pr-4 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"/>
        </div>
        <select wire:model.live="status"
                class="text-sm border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 bg-white">
            <option value="">All Statuses</option>
            <option value="draft">Draft</option>
            <option value="sent">Sent</option>
            <option value="accepted">Accepted</option>
            <option value="rejected">Rejected</option>
            <option value="expired">Expired</option>
        </select>
    </div>

    {{-- Table --}}
    <div class="bg-white rounded-2xl shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100">
                        <th class="text-left px-4 py-3 font-semibold text-gray-600">Ref #</th>
                        <th class="text-left px-4 py-3 font-semibold text-gray-600">Client</th>
                        <th class="text-left px-4 py-3 font-semibold text-gray-600">Total</th>
                        <th class="text-left px-4 py-3 font-semibold text-gray-600">Status</th>
                        <th class="text-left px-4 py-3 font-semibold text-gray-600">Valid Until</th>
                        <th class="text-right px-4 py-3 font-semibold text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($this->quotations as $quotation)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-4 py-3 font-mono text-xs text-gray-500">{{ $quotation->ref_number }}</td>
                        <td class="px-4 py-3 font-medium text-gray-900">{{ $quotation->client?->name ?? '—' }}</td>
                        <td class="px-4 py-3 font-semibold text-gray-900">
                            ₦{{ number_format($quotation->total_kobo / 100, 2) }}
                        </td>
                        <td class="px-4 py-3">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium capitalize {{ $statusColors[$quotation->status] ?? 'bg-gray-100 text-gray-700' }}">
                                {{ $quotation->status }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-gray-600">
                            @if($quotation->valid_until)
                                <span class="{{ $quotation->valid_until->isPast() ? 'text-red-500' : '' }}">
                                    {{ $quotation->valid_until->format('d M Y') }}
                                </span>
                            @else
                                —
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('ops.quotations.show', $quotation) }}"
                                   class="text-xs font-medium text-gray-600 hover:text-gray-900 px-2 py-1 rounded-lg hover:bg-gray-100 transition">
                                    View
                                </a>
                                @if($quotation->status === 'accepted' && !$quotation->jobOrder)
                                <button wire:click="convertToJob({{ $quotation->id }})"
                                        wire:confirm="Convert {{ $quotation->ref_number }} to a job order?"
                                        class="text-xs font-medium text-green-600 hover:text-green-800 px-2 py-1 rounded-lg hover:bg-green-50 transition whitespace-nowrap">
                                    → Job
                                </button>
                                @endif
                                @if(!$quotation->jobOrder)
                                <button wire:click="deleteQuotation({{ $quotation->id }})"
                                        wire:confirm="Delete {{ $quotation->ref_number }}? This cannot be undone."
                                        class="text-xs font-medium text-red-600 hover:text-red-800 px-2 py-1 rounded-lg hover:bg-red-50 transition">
                                    Delete
                                </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-4 py-12 text-center text-gray-400">
                            <svg class="w-10 h-10 mx-auto mb-2 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            No quotations found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($this->quotations->hasPages())
        <div class="px-4 py-3 border-t border-gray-100">
            {{ $this->quotations->links() }}
        </div>
        @endif
    </div>
</div>
