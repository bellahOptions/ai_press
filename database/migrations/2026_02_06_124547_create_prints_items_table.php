<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('prints_items', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->string('item_code');
            $table->string('base_price');
            $table->string('category');
            $table->string('size');
            $table->enum('finishing_option', ['Matte,', 'gloss', '3D', 'stone', 'plain'])->default('plain');
            $table->enum('sides', ['1','2','all']);
            $table->string('print_materials');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prints_items');
    }
};
