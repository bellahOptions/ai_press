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
            <h2 class="text-xl font-bold text-gray-900">Expenses</h2>
            <p class="text-sm text-gray-500 mt-0.5">Track and manage business expenses</p>
        </div>
        <a href="{{ route('ops.expenses.create') }}"
           class="inline-flex items-center gap-2 bg-gradient-to-r from-red-600 to-red-800 text-white text-sm font-semibold px-4 py-2 rounded-xl shadow hover:opacity-90 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            New Expense
        </a>
    </div>

    {{-- Filters + Total summary --}}
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-4 mb-4">
        <div class="lg:col-span-3 bg-white rounded-2xl shadow-md p-4 flex flex-col sm:flex-row gap-3 flex-wrap">
            {{-- Search --}}
            <div class="relative flex-1 min-w-[180px]">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z"/>
                </svg>
                <input wire:model.live.debounce.400ms="search"
                       type="text" placeholder="Search description, vendor…"
                       class="w-full pl-9 pr-4 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"/>
            </div>
            {{-- Category --}}
            <select wire:model.live="categoryId"
                    class="text-sm border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 bg-white min-w-[150px]">
                <option value="">All Categories</option>
                @foreach($this->categories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
            {{-- Date From --}}
            <input wire:model.live="dateFrom" type="date"
                   class="text-sm border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500"
                   title="From date"/>
            {{-- Date To --}}
            <input wire:model.live="dateTo" type="date"
                   class="text-sm border border-gray-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500"
                   title="To date"/>
        </div>

        {{-- Total card --}}
        <div class="bg-white rounded-2xl shadow-md p-4 flex flex-col items-center justify-center text-center">
            <p class="text-xs text-gray-500 uppercase tracking-wide font-semibold mb-1">Filter Total</p>
            <p class="text-2xl font-bold text-gray-900">₦{{ number_format($this->totalKobo / 100, 2) }}</p>
            <p class="text-xs text-gray-400 mt-0.5">Based on current filters</p>
        </div>
    </div>

    {{-- Table --}}
    <div class="bg-white rounded-2xl shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100">
                        <th class="text-left px-4 py-3 font-semibold text-gray-600">Date</th>
                        <th class="text-left px-4 py-3 font-semibold text-gray-600">Category</th>
                        <th class="text-left px-4 py-3 font-semibold text-gray-600">Description</th>
                        <th class="text-left px-4 py-3 font-semibold text-gray-600">Vendor</th>
                        <th class="text-right px-4 py-3 font-semibold text-gray-600">Amount</th>
                        <th class="text-left px-4 py-3 font-semibold text-gray-600">Recorded By</th>
                        <th class="text-right px-4 py-3 font-semibold text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($this->expenses as $expense)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-4 py-3 text-gray-600">{{ $expense->expense_date?->format('d M Y') ?? '—' }}</td>
                        <td class="px-4 py-3">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-purple-50 text-purple-700">
                                {{ $expense->category?->name ?? '—' }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-gray-800 font-medium">{{ $expense->description }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ $expense->vendor ?: '—' }}</td>
                        <td class="px-4 py-3 text-right font-semibold text-gray-900">
                            ₦{{ number_format($expense->amount_kobo / 100, 2) }}
                        </td>
                        <td class="px-4 py-3 text-gray-600">{{ $expense->recordedBy?->name ?? '—' }}</td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('ops.expenses.edit', $expense) }}"
                                   class="text-xs font-medium text-blue-600 hover:text-blue-800 px-2 py-1 rounded-lg hover:bg-blue-50 transition">
                                    Edit
                                </a>
                                <button wire:click="deleteExpense({{ $expense->id }})"
                                        wire:confirm="Delete this expense? This cannot be undone."
                                        class="text-xs font-medium text-red-600 hover:text-red-800 px-2 py-1 rounded-lg hover:bg-red-50 transition">
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-4 py-12 text-center text-gray-400">
                            <svg class="w-10 h-10 mx-auto mb-2 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2z"/>
                            </svg>
                            No expenses found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($this->expenses->hasPages())
        <div class="px-4 py-3 border-t border-gray-100">
            {{ $this->expenses->links() }}
        </div>
        @endif
    </div>
</div>
