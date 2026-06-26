<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('material_categories')->cascadeOnDelete();
            $table->foreignId('supplier_id')->nullable()->constrained()->nullOnDelete();
            $table->string('name');
            $table->string('sku')->unique()->nullable();
            $table->string('unit')->default('pcs'); // pcs, kg, m, litre, ream
            $table->bigInteger('unit_cost_kobo')->default(0); // unit cost in kobo
            $table->decimal('current_stock', 12, 3)->default(0);
            $table->decimal('reorder_threshold', 12, 3)->default(0);
            $table->text('description')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};
