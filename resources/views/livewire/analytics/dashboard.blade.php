<div class="space-y-6">

    {{-- Period selector --}}
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-extrabold text-gray-900">Operations Overview</h2>
            <p class="text-sm text-gray-500 mt-0.5">Real-time snapshot of your print shop</p>
        </div>
        <div class="flex gap-1 bg-gray-100 rounded-xl p-1">
            @foreach(['week' => 'This Week', 'month' => 'This Month', 'year' => 'This Year'] as $val => $label)
            <button wire:click="$set('period', '{{ $val }}')"
                    class="px-4 py-1.5 text-sm font-semibold rounded-lg transition-all {{ $period === $val ? 'bg-white shadow text-gray-900' : 'text-gray-500 hover:text-gray-700' }}">
                {{ $label }}
            </button>
            @endforeach
        </div>
    </div>

    {{-- KPI Cards --}}
    @php $kpi = $this->kpiCards; @endphp
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-4">
            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Revenue</p>
            <p class="text-xl font-extrabold text-green-600">₦{{ number_format($kpi['totalRevenueKobo'] / 100, 0) }}</p>
            <p class="text-xs text-gray-400 mt-1">{{ ucfirst($period) }}</p>
        </div>
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-4">
            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Open Jobs</p>
            <p class="text-xl font-extrabold text-blue-600">{{ $kpi['openJobsCount'] }}</p>
            <a href="{{ route('ops.jobs.index') }}" class="text-xs text-blue-500 mt-1 block hover:underline">View all →</a>
        </div>
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-4">
            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Overdue Invoices</p>
            <p class="text-xl font-extrabold {{ $kpi['overdueInvoicesCount'] > 0 ? 'text-red-600' : 'text-gray-400' }}">{{ $kpi['overdueInvoicesCount'] }}</p>
            <a href="{{ route('ops.invoices.index') }}" class="text-xs text-red-500 mt-1 block hover:underline">View all →</a>
        </div>
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-4">
            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Low Stock</p>
            <p class="text-xl font-extrabold {{ $kpi['lowStockCount'] > 0 ? 'text-amber-600' : 'text-gray-400' }}">{{ $kpi['lowStockCount'] }}</p>
            <a href="{{ route('ops.inventory.index') }}" class="text-xs text-amber-500 mt-1 block hover:underline">Fix now →</a>
        </div>
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-4">
            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">New Leads</p>
            <p class="text-xl font-extrabold text-purple-600">{{ $kpi['newLeadsCount'] }}</p>
            <a href="{{ route('ops.leads.index') }}" class="text-xs text-purple-500 mt-1 block hover:underline">View all →</a>
        </div>
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-4">
            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Pending Dispatch</p>
            <p class="text-xl font-extrabold text-teal-600">{{ $kpi['pendingDispatchCount'] }}</p>
            <a href="{{ route('ops.dispatch.index') }}" class="text-xs text-teal-500 mt-1 block hover:underline">Schedule →</a>
        </div>
    </div>

    {{-- Charts row --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Revenue area chart --}}
        <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 p-5">
            <h3 class="text-sm font-bold text-gray-900 mb-4">Revenue Trend</h3>
            <div id="revenue-chart" wire:ignore></div>
        </div>

        {{-- Pipeline funnel --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5">
            <h3 class="text-sm font-bold text-gray-900 mb-4">Production Pipeline</h3>
            <div id="pipeline-chart" wire:ignore></div>
        </div>
    </div>

    {{-- Revenue vs Expenses + Top Clients --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 p-5">
            <h3 class="text-sm font-bold text-gray-900 mb-4">Revenue vs Expenses (6 months)</h3>
            <div id="revexp-chart" wire:ignore></div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5">
            <h3 class="text-sm font-bold text-gray-900 mb-4">Top 5 Clients</h3>
            <div class="space-y-3">
                @foreach($this->topClients as $i => $client)
                <div class="flex items-center gap-3">
                    <span class="w-6 h-6 rounded-full bg-red-100 text-red-700 text-xs font-bold flex items-center justify-center flex-shrink-0">{{ $i + 1 }}</span>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold text-gray-900 truncate">{{ $client->name }}</p>
                        <p class="text-xs text-gray-500">₦{{ number_format(($client->total_kobo ?? 0) / 100, 0) }}</p>
                    </div>
                </div>
                @endforeach
                @if($this->topClients->isEmpty())
                <p class="text-sm text-gray-400 text-center py-4">No paid invoices yet</p>
                @endif
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const revenueData = @json($this->revenueData);
    const pipelineData = @json($this->pipelineData);
    const revExpData = @json($this->expenseVsRevenue);

    // Revenue chart
    new ApexCharts(document.querySelector('#revenue-chart'), {
        chart: { type: 'area', height: 240, toolbar: { show: false }, fontFamily: 'inherit' },
        series: [{ name: 'Revenue (₦)', data: revenueData.values || [] }],
        xaxis: { categories: revenueData.labels || [], labels: { style: { fontSize: '11px' } } },
        colors: ['#dc2626'],
        fill: { type: 'gradient', gradient: { shadeIntensity: 1, opacityFrom: 0.35, opacityTo: 0.02 } },
        stroke: { curve: 'smooth', width: 2 },
        dataLabels: { enabled: false },
        grid: { strokeDashArray: 4, borderColor: '#f3f4f6' },
        tooltip: { y: { formatter: v => '₦' + parseFloat(v).toLocaleString('en-NG', { minimumFractionDigits: 0 }) } },
    }).render();

    // Pipeline chart
    new ApexCharts(document.querySelector('#pipeline-chart'), {
        chart: { type: 'bar', height: 240, toolbar: { show: false }, fontFamily: 'inherit' },
        plotOptions: { bar: { horizontal: true, borderRadius: 4 } },
        series: [{ name: 'Jobs', data: pipelineData.values || [] }],
        xaxis: { categories: pipelineData.labels || [] },
        colors: ['#dc2626'],
        dataLabels: { enabled: true, style: { fontSize: '11px' } },
        grid: { strokeDashArray: 4, borderColor: '#f3f4f6' },
    }).render();

    // Rev vs Expense chart
    new ApexCharts(document.querySelector('#revexp-chart'), {
        chart: { type: 'bar', height: 240, toolbar: { show: false }, fontFamily: 'inherit', stacked: false },
        series: [
            { name: 'Revenue', data: revExpData.revenue || [] },
            { name: 'Expenses', data: revExpData.expenses || [] },
        ],
        xaxis: { categories: revExpData.labels || [] },
        colors: ['#16a34a', '#dc2626'],
        plotOptions: { bar: { borderRadius: 4, columnWidth: '60%' } },
        dataLabels: { enabled: false },
        grid: { strokeDashArray: 4, borderColor: '#f3f4f6' },
        tooltip: { y: { formatter: v => '₦' + parseFloat(v).toLocaleString('en-NG', { minimumFractionDigits: 0 }) } },
    }).render();
});
</script>
@endpush
