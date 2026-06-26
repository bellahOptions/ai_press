<?php

namespace App\Livewire\Orm;

use App\Models\JobOrder;
use App\Models\Material;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.ops')]
class JobOrderDetail extends Component
{
    public int $jobId;
    public string $notes = '';
    public string $targetStage = '';

    public JobOrder $job;

    public function mount(int $jobId): void
    {
        $this->jobId = $jobId;
        $this->job   = JobOrder::with([
            'client',
            'quotation.items',
            'productionTicket',
            'productionLogs.staff',
            'invoices',
            'materials.material',
            'assignedTo',
        ])->findOrFail($jobId);

        // Pre-select the next logical stage
        $this->targetStage = $this->nextStage();
    }

    protected function nextStage(): string
    {
        $stages  = JobOrder::STAGES;
        $current = $this->job->status;
        $idx     = array_search($current, $stages);

        if ($idx !== false && isset($stages[$idx + 1])) {
            return $stages[$idx + 1];
        }

        return $current;
    }

    public function advanceStage(string $stage): void
    {
        $this->job->refresh();

        if (in_array($this->job->status, ['closed', 'cancelled'])) {
            session()->flash('error', 'This job is already closed or cancelled.');
            return;
        }

        // Deduct materials when transitioning to material_allocation
        if ($stage === 'material_allocation') {
            foreach ($this->job->materials()->where('deducted', false)->get() as $jobMaterial) {
                $material = $jobMaterial->material;
                if ($material) {
                    $material->decrement('current_stock', $jobMaterial->quantity);
                    $jobMaterial->update([
                        'deducted'    => true,
                        'deducted_at' => now(),
                    ]);
                }
            }
        }

        $this->job->transitionTo($stage, auth()->id(), $this->notes);

        session()->flash('success', 'Job advanced to stage: ' . ucwords(str_replace('_', ' ', $stage)));
        $this->redirect(route('ops.jobs.show', $this->jobId), navigate: true);
    }

    public function render()
    {
        // Reload job with fresh data for display
        $this->job = JobOrder::with([
            'client',
            'quotation.items',
            'productionTicket',
            'productionLogs.staff',
            'invoices',
            'materials.material',
            'assignedTo',
        ])->findOrFail($this->jobId);

        return view('livewire.orm.job-order-detail')
            ->title('Job ' . $this->job->job_number);
    }
}
