<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('machine_bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('machine_id')->constrained()->cascadeOnDelete();
            $table->foreignId('job_order_id')->constrained()->cascadeOnDelete();
            $table->timestamp('starts_at');
            $table->timestamp('ends_at');
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->index(['machine_id', 'starts_at', 'ends_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('machine_bookings');
    }
};
