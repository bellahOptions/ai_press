<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('job_order_materials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_order_id')->constrained()->cascadeOnDelete();
            $table->foreignId('material_id')->constrained()->cascadeOnDelete();
            $table->decimal('quantity', 12, 3);
            $table->bigInteger('unit_cost_kobo')->default(0); // cost at time of allocation
            $table->boolean('deducted')->default(false); // has stock been deducted?
            $table->timestamp('deducted_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('job_order_materials');
    }
};
