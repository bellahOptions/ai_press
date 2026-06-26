<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number')->unique(); // ALET/INV/2026/0001
            $table->foreignId('job_order_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('client_id')->constrained()->cascadeOnDelete();
            $table->foreignId('created_by')->constrained('users')->cascadeOnDelete();
            $table->bigInteger('subtotal_kobo')->default(0);
            $table->bigInteger('discount_kobo')->default(0);
            $table->tinyInteger('vat_percent')->default(0);
            $table->bigInteger('vat_kobo')->default(0);
            $table->bigInteger('total_kobo')->default(0);
            $table->bigInteger('advance_paid_kobo')->default(0); // copied from job order
            $table->enum('status', ['draft', 'sent', 'partial', 'paid', 'overdue', 'cancelled'])->default('draft');
            $table->date('due_date')->nullable();
            $table->text('notes')->nullable();
            $table->text('payment_instructions')->nullable();
            $table->timestamp('sent_at')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['status', 'due_date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
