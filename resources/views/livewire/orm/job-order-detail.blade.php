<div>
    @php
    $stages = \App\Models\JobOrder::STAGES;
    $currentStageIdx = array_search($job->status, $stages);

    $stageColors = [
        'pending_advance'    => 'bg-amber-100 text-amber-800 border-amber-300',
        'in_design'          => 'bg-blue-100 text-blue-800 border-blue-300',
        'material_allocation'=> 'bg-purple-100 text-purple-800 border-purple-300',
        'printing'           => 'bg-indigo-100 text-indigo-800 border-indigo-300',
        'finishing'          => 'bg-cyan-100 text-cyan-800 border-cyan-300',
        'qc'                 => 'bg-orange-100 text-orange-800 border-orange-300',
        'ready'              => 'bg-green-100 text-green-800 border-green-300',
        'dispatched'         => 'bg-teal-100 text-teal-800 border-teal-300',
        'closed'             => 'bg-gray-100 text-gray-700 border-gray-300',
        'cancelled'          => 'bg-red-100 text-red-800 border-red-300',
    ];

    $stageLabels = [
        'pending_advance'    => 'Pending Advance',
        'in_design'          => 'In Design',
        'material_allocation'=> 'Material Allocation',
        'printing'           => 'Printing',
        'finishing'          => 'Finishing',
        'qc'                 => 'QC',
        'ready'              => 'Ready',
        'dispatched'         => 'Dispatched',
        'closed'             => 'Closed',
        'cancelled'          => 'Cancelled',
    ];

    $isClosed = in_array($job->status, ['closed', 'cancelled']);
    $isOverdue = $job->due_date && $job->due_date->isPast() && !$isClosed;
    @endphp

    {{-- Back link + header --}}
    <div class="flex items-start justify-between mb-6">
        <div>
            <a href="{{ route('ops.jobs.index') }}" class="text-sm text-gray-500 hover:text-gray-700 flex items-center gap-1 mb-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Job Orders
            </a>
            <h2 class="text-xl font-bold text-gray-900 font-mono">{{ $job->job_number }}</h2>
            <div class="flex items-center gap-3 mt-1">
                <span class="text-sm text-gray-600">{{ $job->client?->name }}</span>
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium border {{ $stageColors[$job->status] ?? 'bg-gray-100 text-gray-700 border-gray-200' }}">
                    {{ $stageLabels[$job->status] ?? $job->status }}
                </span>
                @if($isOverdue)
                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-red-100 text-red-700 border border-red-200">
                    Overdue
                </span>
                @endif
            </div>
        </div>
        <div class="text-right text-sm text-gray-500">
            @if($job->due_date)
            <div>Due: <span class="{{ $isOverdue ? 'text-red-600 font-semibold' : 'text-gray-700 font-medium' }}">{{ $job->due_date->format('d M Y') }}</span></div>
            @endif
            @if($job->assignedTo)
            <div class="mt-0.5">Assigned: <span class="text-gray-700 font-medium">{{ $job->assignedTo->firstName }}</span></div>
            @endif
        </div>
    </div>

    {{-- Progress bar (stage pills) --}}
    <div class="bg-white rounded-2xl shadow-md p-4 mb-6">
        <p class="text-xs font-semibold text-gray-500 uppercase tracking-widest mb-3">Production Progress</p>
        <div class="flex flex-wrap gap-1.5">
            @foreach($stages as $idx => $stage)
            @if($stage === 'cancelled') @continue @endif
            @php
                $isCurrent   = $stage === $job->status;
                $isCompleted = $currentStageIdx !== false && $idx < $currentStageIdx && $job->status !== 'cancelled';
            @endphp
            <div class="flex items-center gap-1">
                <span class="px-2.5 py-1 rounded-full text-xs font-semibold border
                    {{ $isCurrent ? 'bg-red-600 text-white border-red-600 shadow-md' : ($isCompleted ? 'bg-gray-200 text-gray-500 border-gray-200 line-through' : 'bg-white text-gray-400 border-gray-200') }}">
                    {{ $stageLabels[$stage] }}
                </span>
                @if(!$loop->last && $stage !== 'closed')
                <svg class="w-3 h-3 text-gray-300 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                @endif
            </div>
            @endforeach
        </div>
    </div>

    {{-- 3-column content --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">

        {{-- Column 1: Quotation Items --}}
        <div class="bg-white rounded-2xl shadow-md overflow-hidden">
            <div class="px-4 py-3 border-b border-gray-100 bg-gray-50">
                <h3 class="text-sm font-bold text-gray-700">Quotation Items</h3>
            </div>
            @if($job->quotation && $job->quotation->items->count())
            <div class="divide-y divide-gray-50">
                @foreach($job->quotation->items as $item)
                <div class="px-4 py-3">
                    <div class="flex items-start justify-between gap-2">
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate">{{ $item->description }}</p>
                            <p class="text-xs text-gray-500 mt-0.5">Qty: {{ $item->quantity }} × ₦{{ number_format($item->unit_price_kobo / 100, 2) }}</p>
                        </div>
                        <p class="text-sm font-semibold text-gray-900 flex-shrink-0">₦{{ number_format($item->total_kobo / 100, 2) }}</p>
                    </div>
                </div>
                @endforeach
                <div class="px-4 py-3 bg-gray-50">
                    <div class="flex justify-between text-sm font-bold text-gray-900">
                        <span>Total</span>
                        <span>₦{{ number_format($job->quotation->total_kobo / 100, 2) }}</span>
                    </div>
                </div>
            </div>
            @else
            <div class="px-4 py-8 text-center text-sm text-gray-400">No quotation linked</div>
            @endif
        </div>

        {{-- Column 2: Materials --}}
        <div class="bg-white rounded-2xl shadow-md overflow-hidden">
            <div class="px-4 py-3 border-b border-gray-100 bg-gray-50">
                <h3 class="text-sm font-bold text-gray-700">Materials</h3>
            </div>
            @if($job->materials->count())
            <div class="divide-y divide-gray-50">
                @foreach($job->materials as $mat)
                <div class="px-4 py-3">
                    <div class="flex items-start justify-between gap-2">
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate">{{ $mat->material?->name ?? 'Unknown' }}</p>
                            <p class="text-xs text-gray-500 mt-0.5">{{ $mat->quantity }} {{ $mat->material?->unit ?? '' }}</p>
                        </div>
                        <div class="text-right flex-shrink-0">
                            <p class="text-sm font-semibold text-gray-900">₦{{ number_format(($mat->quantity * $mat->unit_cost_kobo) / 100, 2) }}</p>
                            @if($mat->deducted)
                            <span class="text-xs text-green-600 font-medium">Deducted</span>
                            @else
                            <span class="text-xs text-amber-600 font-medium">Pending</span>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="px-4 py-8 text-center text-sm text-gray-400">No materials allocated</div>
            @endif
        </div>

        {{-- Column 3: Production Log --}}
        <div class="bg-white rounded-2xl shadow-md overflow-hidden">
            <div class="px-4 py-3 border-b border-gray-100 bg-gray-50">
                <h3 class="text-sm font-bold text-gray-700">Production Log</h3>
            </div>
            @if($job->productionLogs->count())
            <div class="px-4 py-3 space-y-4 max-h-80 overflow-y-auto">
                @foreach($job->productionLogs as $log)
                <div class="relative pl-5">
                    <div class="absolute left-0 top-1.5 w-2 h-2 rounded-full bg-red-500 flex-shrink-0"></div>
                    <div class="text-xs text-gray-400 mb-0.5">
                        {{ optional($log->transitioned_at)->format('d M Y, H:i') ?? $log->created_at->format('d M Y, H:i') }}
                    </div>
                    <div class="text-sm font-medium text-gray-800">
                        <span class="text-gray-500">{{ $stageLabels[$log->from_stage] ?? $log->from_stage }}</span>
                        <svg class="w-3 h-3 inline-block mx-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        <span class="text-gray-900 font-semibold">{{ $stageLabels[$log->to_stage] ?? $log->to_stage }}</span>
                    </div>
                    <div class="text-xs text-gray-500">by {{ $log->staff?->firstName ?? 'System' }}</div>
                    @if($log->notes)
                    <div class="text-xs text-gray-600 mt-0.5 italic">{{ $log->notes }}</div>
                    @endif
                </div>
                @endforeach
            </div>
            @else
            <div class="px-4 py-8 text-center text-sm text-gray-400">No transitions logged yet</div>
            @endif
        </div>
    </div>

    {{-- Advance Stage card --}}
    @if(!$isClosed)
    <div class="bg-white rounded-2xl shadow-md p-6">
        <h3 class="text-sm font-bold text-gray-700 mb-4">Advance Stage</h3>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 items-end">
            <div class="sm:col-span-1">
                <label class="block text-xs font-medium text-gray-600 mb-1">Target Stage</label>
                <select wire:model="targetStage"
                        class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 bg-white">
                    @foreach($stages as $stage)
                    @if($stage !== $job->status)
                    <option value="{{ $stage }}">{{ $stageLabels[$stage] ?? ucwords(str_replace('_', ' ', $stage)) }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="sm:col-span-2">
                <label class="block text-xs font-medium text-gray-600 mb-1">Notes (optional)</label>
                <textarea wire:model="notes"
                          rows="2"
                          placeholder="Add a note for this transition…"
                          class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 resize-none"></textarea>
            </div>
        </div>
        <div class="mt-4 flex justify-end">
            <button wire:click="advanceStage('{{ $targetStage }}')"
                    wire:confirm="Advance job to {{ $stageLabels[$targetStage] ?? $targetStage }}?"
                    wire:loading.attr="disabled"
                    class="bg-gradient-to-r from-red-600 to-red-800 text-white text-sm font-semibold px-6 py-2 rounded-xl shadow hover:opacity-90 transition disabled:opacity-50 flex items-center gap-2">
                <svg wire:loading class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                </svg>
                Advance Stage
            </button>
        </div>
    </div>
    @else
    <div class="bg-gray-50 border border-gray-200 rounded-2xl p-4 text-center text-sm text-gray-500">
        This job is <strong>{{ $job->status }}</strong> — no further stage transitions are available.
    </div>
    @endif
</div>
