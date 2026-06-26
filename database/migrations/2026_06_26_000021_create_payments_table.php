<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invoice_id')->constrained()->cascadeOnDelete();
            $table->bigInteger('amount_kobo');
            $table->enum('method', ['cash', 'bank_transfer', 'pos', 'paystack', 'flutterwave', 'cheque', 'other'])->default('bank_transfer');
            $table->string('reference')->nullable();
            $table->text('notes')->nullable();
            $table->foreignId('recorded_by')->constrained('users')->cascadeOnDelete();
            $table->timestamp('paid_at')->useCurrent();
            $table->timestamps();

            $table->index(['invoice_id', 'paid_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
