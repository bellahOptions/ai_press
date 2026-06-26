<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payroll', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('created_by')->constrained('users', 'id')->cascadeOnDelete();
            $table->date('period_start');
            $table->date('period_end');
            $table->bigInteger('gross_kobo');
            $table->bigInteger('deductions_kobo')->default(0);
            $table->bigInteger('net_kobo');
            $table->boolean('paid')->default(false);
            $table->timestamp('paid_at')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payroll');
    }
};
