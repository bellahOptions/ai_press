<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->string('ref_number')->unique(); // ALET/PO/2026/0001
            $table->foreignId('supplier_id')->constrained()->cascadeOnDelete();
            $table->foreignId('created_by')->constrained('users')->cascadeOnDelete();
            $table->enum('status', ['draft', 'sent', 'received', 'partial', 'cancelled'])->default('draft');
            $table->bigInteger('total_kobo')->default(0);
            $table->text('notes')->nullable();
            $table->timestamp('ordered_at')->nullable();
            $table->timestamp('received_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('purchase_orders');
    }
};
