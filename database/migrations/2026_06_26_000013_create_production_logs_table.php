<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('production_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('production_ticket_id')->constrained()->cascadeOnDelete();
            $table->foreignId('job_order_id')->constrained()->cascadeOnDelete();
            $table->foreignId('staff_id')->constrained('users')->cascadeOnDelete();
            $table->string('from_stage')->nullable();
            $table->string('to_stage');
            $table->text('notes')->nullable();
            $table->timestamp('transitioned_at')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('production_logs');
    }
};
