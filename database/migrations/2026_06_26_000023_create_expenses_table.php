<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('expense_categories')->cascadeOnDelete();
            $table->foreignId('job_order_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('recorded_by')->constrained('users')->cascadeOnDelete();
            $table->string('description');
            $table->bigInteger('amount_kobo');
            $table->string('vendor')->nullable();
            $table->string('receipt_path')->nullable();
            $table->date('expense_date');
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('expense_date');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
