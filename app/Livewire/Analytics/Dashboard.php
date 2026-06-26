<?php

namespace App\Livewire\Analytics;

use App\Models\Delivery;
use App\Models\Invoice;
use App\Models\JobOrder;
use App\Models\Lead;
use App\Models\Material;
use App\Models\Payment;
use App\Models\Expense;
use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;

#[Layout('layouts.ops')]
class Dashboard extends Component
{
    public string $period = 'month';

    private function startDate(): Carbon
    {
        return match ($this->period) {
            'week'  => now()->subWeek(),
            'year'  => now()->subYear(),
            default => now()->subMonth(),
        };
    }

    #[Computed]
    public function revenueData(): array
    {
        $format = $this->period === 'year' ? '%b %Y' : '%d %b';

        $rows = Payment::selectRaw("DATE_FORMAT(paid_at, '{$format}') as label, SUM(amount_kobo)/100 as value, paid_at")
            ->whereBetween('paid_at', [$this->startDate(), now()])
            ->groupBy('label', DB::raw("DATE_FORMAT(paid_at, '{$format}')"))
            ->orderBy('paid_at')
            ->get();

        return [
            'labels' => $rows->pluck('label')->toArray(),
            'values' => $rows->pluck('value')->map(fn ($v) => round((float) $v, 2))->toArray(),
        ];
    }

    #[Computed]
    public function pipelineData(): array
    {
        $stages = ['in_design', 'material_allocation', 'printing', 'finishing', 'qc', 'ready'];
        $counts = JobOrder::select('status', DB::raw('count(*) as count'))
            ->whereIn('status', $stages)
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();

        return [
            'labels' => array_map(fn ($s) => ucwords(str_replace('_', ' ', $s)), $stages),
            'values' => array_map(fn ($s) => (int) ($counts[$s] ?? 0), $stages),
        ];
    }

    #[Computed]
    public function expenseVsRevenue(): array
    {
        $months = collect(range(5, 0))->map(fn ($i) => now()->subMonths($i));

        $revenue = Payment::selectRaw("DATE_FORMAT(paid_at, '%Y-%m') as ym, SUM(amount_kobo)/100 as total")
            ->where('paid_at', '>=', now()->subMonths(5)->startOfMonth())
            ->groupBy('ym')->pluck('total', 'ym');

        $expenses = Expense::selectRaw("DATE_FORMAT(expense_date, '%Y-%m') as ym, SUM(amount_kobo)/100 as total")
            ->where('expense_date', '>=', now()->subMonths(5)->startOfMonth())
            ->groupBy('ym')->pluck('total', 'ym');

        return [
            'labels'   => $months->map(fn ($m) => $m->format('M Y'))->toArray(),
            'revenue'  => $months->map(fn ($m) => round((float) ($revenue[$m->format('Y-m')] ?? 0), 2))->toArray(),
            'expenses' => $months->map(fn ($m) => round((float) ($expenses[$m->format('Y-m')] ?? 0), 2))->toArray(),
        ];
    }

    #[Computed]
    public function kpiCards(): array
    {
        $start = $this->startDate();

        return [
            'totalRevenueKobo'       => (int) Payment::whereBetween('paid_at', [$start, now()])->sum('amount_kobo'),
            'openJobsCount'          => JobOrder::whereNotIn('status', ['closed', 'cancelled'])->count(),
            'overdueInvoicesCount'   => Invoice::where(function ($q) {
                $q->where('status', 'overdue')
                  ->orWhere(fn ($q2) => $q2->where('due_date', '<', today())->whereNotIn('status', ['paid', 'cancelled']));
            })->count(),
            'lowStockCount'          => Material::whereColumn('current_stock', '<=', 'reorder_threshold')->where('active', true)->count(),
            'newLeadsCount'          => Lead::whereBetween('created_at', [$start, now()])->count(),
            'pendingDispatchCount'   => Delivery::where('status', 'scheduled')->count(),
        ];
    }

    #[Computed]
    public function topClients(): \Illuminate\Support\Collection
    {
        return Client::withSum(['invoices as total_kobo' => fn ($q) => $q->where('status', 'paid')], 'total_kobo')
            ->orderByDesc('total_kobo')
            ->limit(5)
            ->get();
    }

    public function render()
    {
        return view('livewire.analytics.dashboard');
    }
}
