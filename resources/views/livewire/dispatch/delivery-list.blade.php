<div>
    {{-- Flash messages --}}
    @if(session('success'))
    <div class="mb-4 rounded-xl bg-green-50 border border-green-200 px-4 py-3 text-sm text-green-700">
        {{ session('success') }}
    </div>
    @endif
    @if(session('error'))
    <div class="mb-4 rounded-xl bg-red-50 border border-red-200 px-4 py-3 text-sm text-red-700">
        {{ session('error') }}
    </div>
    @endif

    {{-- Page header --}}
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-xl font-bold text-gray-900">Deliveries</h2>
            <p class="text-sm text-gray-500 mt-0.5">Track and manage dispatch and pickups</p>
        </div>
        <a href="{{ route('ops.dispatch.create') }}"
           class="inline-flex items-center gap-2 bg-gradient-to-r from-red-600 to-red-800 text-white text-sm font-semibold px-4 py-2 rounded-xl shadow hover:opacity-90 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            New Delivery
        </a>
    </div>

    {{-- Filters --}}
    <div class="bg-white rounded-2xl shadow-md p-4 mb-4 flex flex-col sm:flex-row gap-3">
        <div class="relative flex-1">
            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z"/>
            </svg>
            <input wire:model.live.debounce.400ms="search"
                   type="text" placeholder="Search job #, client, recipient…"
                   class="w-full pl-9 pr-4 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"/>
        </div>
        <select wire:model.live="status"
                class="text-sm border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 bg-white min-w-[170px]">
            <option value="">All Statuses</option>
            <option value="scheduled">Scheduled</option>
            <option value="out_for_delivery">Out for Delivery</option>
            <option value="delivered">Delivered</option>
            <option value="failed">Failed</option>
            <option value="returned">Returned</option>
        </select>
    </div>

    {{-- Table --}}
    <div class="bg-white rounded-2xl shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100">
                        <th class="text-left px-4 py-3 font-semibold text-gray-600">Job #</th>
                        <th class="text-left px-4 py-3 font-semibold text-gray-600">Client</th>
                        <th class="text-left px-4 py-3 font-semibold text-gray-600">Type</th>
                        <th class="text-left px-4 py-3 font-semibold text-gray-600">Status</th>
                        <th class="text-left px-4 py-3 font-semibold text-gray-600">Recipient</th>
                        <th class="text-left px-4 py-3 font-semibold text-gray-600">Scheduled</th>
                        <th class="text-left px-4 py-3 font-semibold text-gray-600">Delivered</th>
                        <th class="text-right px-4 py-3 font-semibold text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($this->deliveries as $delivery)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-4 py-3 font-mono text-xs font-semibold text-gray-700">
                            {{ $delivery->jobOrder?->job_number ?? '—' }}
                        </td>
                        <td class="px-4 py-3 font-medium text-gray-900">
                            {{ $delivery->jobOrder?->client?->name ?? '—' }}
                        </td>
                        <td class="px-4 py-3">
                            @if($delivery->type === 'pickup')
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-purple-100 text-purple-700">
                                Pickup
                            </span>
                            @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">
                                Delivery
                            </span>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            @php
                                $statusClasses = [
                                    'scheduled'        => 'bg-blue-100 text-blue-700',
                                    'out_for_delivery' => 'bg-amber-100 text-amber-700',
                                    'delivered'        => 'bg-green-100 text-green-700',
                                    'failed'           => 'bg-red-100 text-red-700',
                                    'returned'         => 'bg-gray-100 text-gray-600',
                                ];
                                $statusLabels = [
                                    'scheduled'        => 'Scheduled',
                                    'out_for_delivery' => 'Out for Delivery',
                                    'delivered'        => 'Delivered',
                                    'failed'           => 'Failed',
                                    'returned'         => 'Returned',
                                ];
                            @endphp
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold
                                         {{ $statusClasses[$delivery->status] ?? 'bg-gray-100 text-gray-600' }}">
                                {{ $statusLabels[$delivery->status] ?? $delivery->status }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-gray-600">
                            <div>{{ $delivery->recipient_name }}</div>
                            @if($delivery->recipient_phone)
                            <div class="text-xs text-gray-400">{{ $delivery->recipient_phone }}</div>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-gray-600">
                            {{ $delivery->scheduled_at?->format('d M Y, H:i') ?? '—' }}
                        </td>
                        <td class="px-4 py-3 text-gray-600">
                            {{ $delivery->delivered_at?->format('d M Y, H:i') ?? '—' }}
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('ops.dispatch.show', $delivery) }}"
                                   class="text-xs font-medium text-gray-600 hover:text-gray-900 px-2 py-1 rounded-lg hover:bg-gray-100 transition">
                                    View
                                </a>
                                @if(!in_array($delivery->status, ['delivered', 'cancelled', 'returned']))
                                <button wire:click="markDelivered({{ $delivery->id }})"
                                        wire:confirm="Mark this delivery as delivered?"
                                        class="text-xs font-medium text-green-600 hover:text-green-800 px-2 py-1 rounded-lg hover:bg-green-50 transition">
                                    Mark Delivered
                                </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-4 py-12 text-center text-gray-400">
                            <svg class="w-10 h-10 mx-auto mb-2 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
                            </svg>
                            No deliveries found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($this->deliveries->hasPages())
        <div class="px-4 py-3 border-t border-gray-100">
            {{ $this->deliveries->links() }}
        </div>
        @endif
    </div>
</div>
