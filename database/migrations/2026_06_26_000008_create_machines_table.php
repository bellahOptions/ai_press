<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('machines', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type'); // digital_press, offset, large_format, cutting, binding, lamination
            $table->enum('status', ['available', 'busy', 'maintenance', 'offline'])->default('available');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('machines');
    }
};
