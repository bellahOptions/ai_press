<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('job_orders', function (Blueprint $table) {
            $table->id();
            $table->string('job_number')->unique(); // ALET/JOB/2026/0001
            $table->foreignId('quotation_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('client_id')->constrained()->cascadeOnDelete();
            $table->foreignId('created_by')->constrained('users')->cascadeOnDelete();
            $table->foreignId('assigned_to')->nullable()->constrained('users')->nullOnDelete();
            // State machine values:
            $table->string('status')->default('pending_advance');
            // pending_advance, in_design, in_production, qc, ready, dispatched, closed, cancelled
            $table->bigInteger('advance_paid_kobo')->default(0);
            $table->tinyInteger('advance_percent')->default(50);
            $table->date('due_date')->nullable();
            $table->string('job_type')->nullable();
            $table->text('specs')->nullable();
            $table->text('notes')->nullable();
            $table->boolean('dispatch_override')->default(false);
            $table->text('dispatch_override_reason')->nullable();
            $table->foreignId('dispatch_override_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
            $table->softDeletes();

            $table->index('status');
            $table->index('due_date');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('job_orders');
    }
};
