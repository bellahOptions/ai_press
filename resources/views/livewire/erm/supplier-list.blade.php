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
            <h2 class="text-xl font-bold text-gray-900">Suppliers</h2>
            <p class="text-sm text-gray-500 mt-0.5">Manage material suppliers</p>
        </div>
        <a href="{{ route('ops.suppliers.create') }}"
           class="inline-flex items-center gap-2 bg-gradient-to-r from-red-600 to-red-800 text-white text-sm font-semibold px-4 py-2 rounded-xl shadow hover:opacity-90 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            New Supplier
        </a>
    </div>

    {{-- Search --}}
    <div class="bg-white rounded-2xl shadow-md p-4 mb-4">
        <div class="relative">
            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z"/>
            </svg>
            <input wire:model.live.debounce.400ms="search"
                   type="text"
                   placeholder="Search name, email, contact person…"
                   class="w-full pl-9 pr-4 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"/>
        </div>
    </div>

    {{-- Table --}}
    <div class="bg-white rounded-2xl shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100">
                        <th class="text-left px-4 py-3 font-semibold text-gray-600">Name</th>
                        <th class="text-left px-4 py-3 font-semibold text-gray-600">Email</th>
                        <th class="text-left px-4 py-3 font-semibold text-gray-600">Phone</th>
                        <th class="text-left px-4 py-3 font-semibold text-gray-600">Contact Person</th>
                        <th class="text-left px-4 py-3 font-semibold text-gray-600">Status</th>
                        <th class="text-right px-4 py-3 font-semibold text-gray-600"># Materials</th>
                        <th class="text-right px-4 py-3 font-semibold text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($this->suppliers as $supplier)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-4 py-3 font-medium text-gray-900">{{ $supplier->name }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ $supplier->email ?: '—' }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ $supplier->phone ?: '—' }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ $supplier->contact_person ?: '—' }}</td>
                        <td class="px-4 py-3">
                            @if($supplier->active)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                                Active
                            </span>
                            @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-gray-100 text-gray-600">
                                Inactive
                            </span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-right text-gray-700 font-medium">{{ $supplier->materials_count }}</td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('ops.suppliers.edit', $supplier) }}"
                                   class="text-xs font-medium text-blue-600 hover:text-blue-800 px-2 py-1 rounded-lg hover:bg-blue-50 transition">
                                    Edit
                                </a>
                                <button wire:click="toggleActive({{ $supplier->id }})"
                                        class="text-xs font-medium px-2 py-1 rounded-lg transition
                                               {{ $supplier->active
                                                  ? 'text-orange-600 hover:text-orange-800 hover:bg-orange-50'
                                                  : 'text-green-600 hover:text-green-800 hover:bg-green-50' }}">
                                    {{ $supplier->active ? 'Deactivate' : 'Activate' }}
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-4 py-12 text-center text-gray-400">
                            <svg class="w-10 h-10 mx-auto mb-2 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                            No suppliers found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($this->suppliers->hasPages())
        <div class="px-4 py-3 border-t border-gray-100">
            {{ $this->suppliers->links() }}
        </div>
        @endif
    </div>
</div>
