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
            <h2 class="text-xl font-bold text-gray-900">Payroll</h2>
            <p class="text-sm text-gray-500 mt-0.5">Staff payroll records and payment tracking</p>
        </div>
        <a href="{{ route('ops.payroll.create') }}"
           class="inline-flex items-center gap-2 bg-gradient-to-r from-red-600 to-red-800 text-white text-sm font-semibold px-4 py-2 rounded-xl shadow hover:opacity-90 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            New Payroll
        </a>
    </div>

    {{-- Filters --}}
    <div class="bg-white rounded-2xl shadow-md p-4 mb-4 flex flex-col sm:flex-row gap-3">
        <div class="relative flex-1">
            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z"/>
            </svg>
            <input wire:model.live.debounce.400ms="search"
                   type="text" placeholder="Search staff name…"
                   class="w-full pl-9 pr-4 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"/>
        </div>
        <select wire:model.live="year"
                class="text-sm border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 bg-white min-w-[120px]">
            <option value="">All Years</option>
            @for($y = now()->year; $y >= now()->year - 5; $y--)
            <option value="{{ $y }}">{{ $y }}</option>
            @endfor
        </select>
    </div>

    {{-- Table --}}
    <div class="bg-white rounded-2xl shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100">
                        <th class="text-left px-4 py-3 font-semibold text-gray-600">Staff Name</th>
                        <th class="text-left px-4 py-3 font-semibold text-gray-600">Period</th>
                        <th class="text-right px-4 py-3 font-semibold text-gray-600">Gross</th>
                        <th class="text-right px-4 py-3 font-semibold text-gray-600">Deductions</th>
                        <th class="text-right px-4 py-3 font-semibold text-gray-600">Net</th>
                        <th class="text-left px-4 py-3 font-semibold text-gray-600">Status</th>
                        <th class="text-right px-4 py-3 font-semibold text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($this->payrolls as $payroll)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-red-100 to-red-200 flex items-center justify-center text-red-700 font-bold text-xs flex-shrink-0">
                                    {{ strtoupper(substr($payroll->user?->name ?? '?', 0, 1)) }}
                                </div>
                                <span class="font-medium text-gray-900">{{ $payroll->user?->name ?? '—' }}</span>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-gray-600">
                            {{ $payroll->period_start?->format('d M Y') }} – {{ $payroll->period_end?->format('d M Y') }}
                        </td>
                        <td class="px-4 py-3 text-right text-gray-700">
                            ₦{{ number_format($payroll->gross_kobo / 100, 2) }}
                        </td>
                        <td class="px-4 py-3 text-right text-red-600">
                            - ₦{{ number_format($payroll->deductions_kobo / 100, 2) }}
                        </td>
                        <td class="px-4 py-3 text-right font-bold text-gray-900">
                            ₦{{ number_format($payroll->net_kobo / 100, 2) }}
                        </td>
                        <td class="px-4 py-3">
                            @if($payroll->paid)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                                Paid
                            </span>
                            @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-orange-100 text-orange-700">
                                Pending
                            </span>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-end gap-2">
                                @if(!$payroll->paid)
                                <button wire:click="markPaid({{ $payroll->id }})"
                                        wire:confirm="Mark this payroll as paid?"
                                        class="text-xs font-medium text-green-600 hover:text-green-800 px-2 py-1 rounded-lg hover:bg-green-50 transition">
                                    Record Payment
                                </button>
                                @else
                                <span class="text-xs text-gray-400">
                                    Paid {{ $payroll->paid_at?->format('d M Y') }}
                                </span>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-4 py-12 text-center text-gray-400">
                            <svg class="w-10 h-10 mx-auto mb-2 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            No payroll records found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($this->payrolls->hasPages())
        <div class="px-4 py-3 border-t border-gray-100">
            {{ $this->payrolls->links() }}
        </div>
        @endif
    </div>
</div>
