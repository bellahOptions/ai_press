<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('production_tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_order_id')->constrained()->cascadeOnDelete();
            $table->string('current_stage')->default('design');
            // design, material_allocation, printing, finishing, qc, packed, ready
            $table->foreignId('assigned_to')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('machine_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamp('stage_started_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->string('proof_file')->nullable(); // path to uploaded proof
            $table->boolean('client_proof_approved')->default(false);
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('production_tickets');
    }
};
