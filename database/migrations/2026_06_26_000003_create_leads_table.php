<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('lead_number')->unique(); // e.g. ALET/LEAD/2026/0001
            $table->foreignId('client_id')->nullable()->constrained()->nullOnDelete();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('company')->nullable();
            $table->enum('source', ['walk_in', 'referral', 'social', 'website', 'phone', 'other'])->default('walk_in');
            $table->enum('status', ['new', 'contacted', 'qualified', 'quoted', 'converted', 'lost'])->default('new');
            $table->string('job_type')->nullable();
            $table->text('requirements')->nullable();
            $table->string('budget_range')->nullable();
            $table->date('desired_date')->nullable();
            $table->foreignId('assigned_to')->nullable()->constrained('users')->nullOnDelete();
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
