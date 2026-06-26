<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('communications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('lead_id')->nullable()->constrained()->nullOnDelete();
            $table->enum('type', ['call', 'email', 'whatsapp', 'in_person', 'sms', 'note'])->default('note');
            $table->enum('direction', ['inbound', 'outbound'])->default('outbound');
            $table->string('subject')->nullable();
            $table->text('notes');
            $table->foreignId('staff_id')->constrained('users')->cascadeOnDelete();
            $table->timestamp('communicated_at')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('communications');
    }
};
