<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->string('ref_number')->unique(); // ALET/QT/2026/0001
            $table->foreignId('client_id')->constrained()->cascadeOnDelete();
            $table->foreignId('lead_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('created_by')->constrained('users')->cascadeOnDelete();
            $table->bigInteger('subtotal_kobo')->default(0);
            $table->bigInteger('discount_kobo')->default(0);
            $table->tinyInteger('vat_percent')->default(0); // e.g. 7 for 7.5%
            $table->bigInteger('vat_kobo')->default(0);
            $table->bigInteger('total_kobo')->default(0);
            $table->enum('status', ['draft', 'sent', 'accepted', 'rejected', 'expired'])->default('draft');
            $table->date('valid_until')->nullable();
            $table->text('terms')->nullable();
            $table->text('notes')->nullable();
            $table->timestamp('sent_at')->nullable();
            $table->timestamp('accepted_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quotations');
    }
};
