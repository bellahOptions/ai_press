<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_order_id')->constrained()->cascadeOnDelete();
            $table->foreignId('client_id')->constrained()->cascadeOnDelete();
            $table->foreignId('dispatch_officer_id')->nullable()->constrained('users')->nullOnDelete();
            $table->enum('type', ['pickup', 'delivery'])->default('pickup');
            $table->enum('status', ['scheduled', 'out_for_delivery', 'delivered', 'failed', 'returned'])->default('scheduled');
            $table->string('recipient_name')->nullable();
            $table->string('recipient_phone')->nullable();
            $table->text('address')->nullable();
            $table->timestamp('scheduled_at')->nullable();
            $table->timestamp('delivered_at')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('deliveries');
    }
};
