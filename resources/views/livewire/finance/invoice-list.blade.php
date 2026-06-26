<div>
    {{-- Flash messages --}}
    @if(session('success'))
    <div class="mb-4 rounded-xl bg-green-50 border border-green-200 px-4 py-3 text-sm text-green-700">
        {{ session('success') }}
    </div>
    @endif

    {{-- Page header --}}
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-xl font-bold text-gray-900">Invoices</h2>
            <p class="text-sm text-gray-500 mt-0.5">Manage client invoices and payments</p>
        </div>
        <a href="{{ route('ops.invoices.create') }}"
           class="inline-flex items-center gap-2 bg-gradient-to-r from-red-600 to-red-800 text-white text-sm font-semibold px-4 py-2 rounded-xl shadow hover:opacity-90 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            New Invoice
        </a>
    </div>

    {{-- Filters --}}
    <div class="bg-white rounded-2xl shadow-md p-4 mb-4 flex flex-col sm:flex-row gap-3">
        <div class="relative flex-1">
            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z"/>
            </svg>
            <input wire:model.live.debounce.400ms="search"
                   type="text"
                   placeholder="Search invoice # or client name…"
                   class="w-full pl-9 pr-4 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"/>
        </div>
        <select wire:model.live="status"
                class="text-sm border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 bg-white min-w-[150px]">
            <option value="">All Statuses</option>
            <option value="draft">Draft</option>
            <option value="sent">Sent</option>
            <option value="partial">Partial</option>
            <option value="paid">Paid</option>
            <option value="overdue">Overdue</option>
            <option value="cancelled">Cancelled</option>
        </select>
    </div>

    {{-- Table --}}
    <div class="bg-white rounded-2xl shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100">
                        <th class="text-left px-4 py-3 font-semibold text-gray-600">Invoice #</th>
                        <th class="text-left px-4 py-3 font-semibold text-gray-600">Client</th>
                        <th class="text-right px-4 py-3 font-semibold text-gray-600">Total</th>
                        <th class="text-right px-4 py-3 font-semibold text-gray-600">Advance Paid</th>
                        <th class="text-right px-4 py-3 font-semibold text-gray-600">Balance</th>
                        <th class="text-left px-4 py-3 font-semibold text-gray-600">Status</th>
                        <th class="text-left px-4 py-3 font-semibold text-gray-600">Due Date</th>
                        <th class="text-right px-4 py-3 font-semibold text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($this->invoices as $inv)
                    @php
                        $isOverdue = $inv->due_date && $inv->due_date->isPast() && !in_array($inv->status, ['paid','cancelled']);
                    @endphp
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-4 py-3 font-mono text-xs font-semibold text-gray-700">{{ $inv->invoice_number }}</td>
                        <td class="px-4 py-3 font-medium text-gray-900">{{ $inv->client?->name ?? '—' }}</td>
                        <td class="px-4 py-3 text-right font-medium text-gray-900">
                            ₦{{ number_format($inv->total_kobo / 100, 2) }}
                        </td>
                        <td class="px-4 py-3 text-right text-gray-600">
                            ₦{{ number_format($inv->advance_paid_kobo / 100, 2) }}
                        </td>
                        <td class="px-4 py-3 text-right font-semibold {{ $inv->balance_kobo > 0 ? 'text-red-600' : 'text-green-600' }}">
                            ₦{{ number_format($inv->balance_kobo / 100, 2) }}
                        </td>
                        <td class="px-4 py-3">
                            @php
                                $statusClasses = [
                                    'draft'     => 'bg-gray-100 text-gray-600',
                                    'sent'      => 'bg-blue-100 text-blue-700',
                                    'partial'   => 'bg-yellow-100 text-yellow-700',
                                    'paid'      => 'bg-green-100 text-green-700',
                                    'overdue'   => 'bg-red-100 text-red-700',
                                    'cancelled' => 'bg-gray-100 text-gray-500',
                                ];
                            @endphp
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold capitalize
                                         {{ $statusClasses[$inv->status] ?? 'bg-gray-100 text-gray-600' }}">
                                {{ $inv->status }}
                            </span>
                        </td>
                        <td class="px-4 py-3 {{ $isOverdue ? 'text-red-600 font-semibold' : 'text-gray-600' }}">
                            {{ $inv->due_date ? $inv->due_date->format('d M Y') : '—' }}
                            @if($isOverdue) <span class="text-xs">(Overdue)</span> @endif
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('ops.invoices.show', $inv) }}"
                                   class="text-xs font-medium text-gray-600 hover:text-gray-900 px-2 py-1 rounded-lg hover:bg-gray-100 transition">
                                    View
                                </a>
                                @if(!in_array($inv->status, ['paid','cancelled']))
                                <a href="{{ route('ops.invoices.payment', $inv) }}"
                                   class="text-xs font-medium text-green-600 hover:text-green-800 px-2 py-1 rounded-lg hover:bg-green-50 transition">
                                    Pay
                                </a>
                                @endif
                                <a href="{{ route('ops.invoices.pdf', $inv->id) }}"
                                   target="_blank"
                                   class="text-xs font-medium text-blue-600 hover:text-blue-800 px-2 py-1 rounded-lg hover:bg-blue-50 transition">
                                    PDF
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-4 py-12 text-center text-gray-400">
                            <svg class="w-10 h-10 mx-auto mb-2 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            No invoices found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($this->invoices->hasPages())
        <div class="px-4 py-3 border-t border-gray-100">
            {{ $this->invoices->links() }}
        </div>
        @endif
    </div>
</div>
