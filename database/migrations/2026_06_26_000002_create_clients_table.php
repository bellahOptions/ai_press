<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('company')->nullable();
            $table->text('address')->nullable();
            $table->enum('lead_source', ['walk_in', 'referral', 'social', 'website', 'phone', 'other'])->default('walk_in');
            $table->enum('segment', ['corporate', 'event', 'personal', 'reseller', 'education', 'other'])->default('personal');
            $table->text('notes')->nullable();
            $table->bigInteger('clv_kobo')->default(0); // cached lifetime value in kobo
            $table->foreignId('assigned_to')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
