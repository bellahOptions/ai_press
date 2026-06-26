<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stock_movements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('material_id')->constrained()->cascadeOnDelete();
            $table->enum('type', ['stock_in', 'stock_out', 'adjustment', 'return'])->default('stock_in');
            $table->decimal('quantity', 12, 3); // positive = in, negative = out
            $table->decimal('stock_after', 12, 3); // snapshot of stock after movement
            $table->bigInteger('unit_cost_kobo')->default(0);
            $table->foreignId('job_order_id')->nullable()->constrained()->nullOnDelete();
            $table->unsignedBigInteger('purchase_order_id')->nullable()->index();
            $table->foreignId('staff_id')->constrained('users')->cascadeOnDelete();
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->index(['material_id', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stock_movements');
    }
};
