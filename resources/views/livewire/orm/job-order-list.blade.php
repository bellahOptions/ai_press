<div>
    @php
    $stageColors = [
        'pending_advance'    => 'bg-amber-100 text-amber-800',
        'in_design'          => 'bg-blue-100 text-blue-800',
        'material_allocation'=> 'bg-purple-100 text-purple-800',
        'printing'           => 'bg-indigo-100 text-indigo-800',
        'finishing'          => 'bg-cyan-100 text-cyan-800',
        'qc'                 => 'bg-orange-100 text-orange-800',
        'ready'              => 'bg-green-100 text-green-800',
        'dispatched'         => 'bg-teal-100 text-teal-800',
        'closed'             => 'bg-gray-100 text-gray-700',
        'cancelled'          => 'bg-red-100 text-red-800',
    ];
    $stageLabels = [
        'pending_advance'    => 'Pending Advance',
        'in_design'          => 'In Design',
        'material_allocation'=> 'Materials',
        'printing'           => 'Printing',
        'finishing'          => 'Finishing',
        'qc'                 => 'QC',
        'ready'              => 'Ready',
        'dispatched'         => 'Dispatched',
        'closed'             => 'Closed',
        'cancelled'          => 'Cancelled',
    ];
    @endphp

    {{-- Page header --}}
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-xl font-bold text-gray-900">Job Orders</h2>
            <p class="text-sm text-gray-500 mt-0.5">Track production progress across all jobs</p>
        </div>
    </div>

    {{-- Stage summary pills --}}
    <div class="bg-white rounded-2xl shadow-md p-4 mb-4">
        <p class="text-xs font-semibold text-gray-500 uppercase tracking-widest mb-3">Stage Overview</p>
        <div class="flex flex-wrap gap-2">
            @foreach($stageLabels as $stage => $label)
            <button wire:click="$set('status', '{{ $stage }}')"
                    class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold {{ $stageColors[$stage] }} {{ $status === $stage ? 'ring-2 ring-offset-1 ring-current' : 'opacity-80 hover:opacity-100' }} transition cursor-pointer">
                {{ $label }}
                @if(!empty($this->stageCounts[$stage]))
                <span class="font-bold">{{ $this->stageCounts[$stage] }}</span>
                @else
                <span class="opacity-50">0</span>
                @endif
            </button>
            @endforeach
            @if($status)
            <button wire:click="$set('status', '')"
                    class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-medium text-gray-500 bg-gray-100 hover:bg-gray-200 transition">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                Clear
            </button>
            @endif
        </div>
    </div>

    {{-- Search filter --}}
    <div class="bg-white rounded-2xl shadow-md p-4 mb-4">
        <div class="relative">
            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z"/>
            </svg>
            <input wire:model.live.debounce.400ms="search"
                   type="text"
                   placeholder="Search job # or client name…"
                   class="w-full pl-9 pr-4 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"/>
        </div>
    </div>

    {{-- Table --}}
    <div class="bg-white rounded-2xl shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100">
                        <th class="text-left px-4 py-3 font-semibold text-gray-600">Job #</th>
                        <th class="text-left px-4 py-3 font-semibold text-gray-600">Client</th>
                        <th class="text-left px-4 py-3 font-semibold text-gray-600">Status</th>
                        <th class="text-left px-4 py-3 font-semibold text-gray-600">Assigned To</th>
                        <th class="text-left px-4 py-3 font-semibold text-gray-600">Due Date</th>
                        <th class="text-right px-4 py-3 font-semibold text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($this->jobOrders as $job)
                    @php $isOverdue = $job->due_date && $job->due_date->isPast() && !in_array($job->status, ['closed', 'cancelled', 'dispatched']); @endphp
                    <tr class="hover:bg-gray-50 transition-colors {{ $isOverdue ? 'bg-red-50/40' : '' }}">
                        <td class="px-4 py-3 font-mono text-xs text-gray-500">{{ $job->job_number }}</td>
                        <td class="px-4 py-3 font-medium text-gray-900">{{ $job->client?->name ?? '—' }}</td>
                        <td class="px-4 py-3">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $stageColors[$job->status] ?? 'bg-gray-100 text-gray-700' }}">
                                {{ $stageLabels[$job->status] ?? $job->status }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-gray-600">{{ $job->assignedTo?->firstName ?? '—' }}</td>
                        <td class="px-4 py-3">
                            @if($job->due_date)
                                <span class="{{ $isOverdue ? 'text-red-600 font-semibold' : 'text-gray-600' }}">
                                    {{ $job->due_date->format('d M Y') }}
                                    @if($isOverdue) <span class="text-xs">(overdue)</span> @endif
                                </span>
                            @else
                                <span class="text-gray-400">—</span>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('ops.jobs.show', $job) }}"
                                   class="text-xs font-medium text-gray-600 hover:text-gray-900 px-2 py-1 rounded-lg hover:bg-gray-100 transition">
                                    View
                                </a>
                                @if(!in_array($job->status, ['closed', 'cancelled']))
                                <a href="{{ route('ops.jobs.show', $job) }}"
                                   class="text-xs font-medium text-red-600 hover:text-red-800 px-2 py-1 rounded-lg hover:bg-red-50 transition whitespace-nowrap">
                                    Advance
                                </a>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-4 py-12 text-center text-gray-400">
                            <svg class="w-10 h-10 mx-auto mb-2 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                            No job orders found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($this->jobOrders->hasPages())
        <div class="px-4 py-3 border-t border-gray-100">
            {{ $this->jobOrders->links() }}
        </div>
        @endif
    </div>
</div>
