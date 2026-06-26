<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('posts')) {
            Schema::create('posts', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained()->onDelete('cascade');
                $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete();
                $table->string('title');
                $table->string('slug')->unique();
                $table->string('excerpt')->nullable();
                $table->string('image')->nullable();
                $table->longText('content');
                $table->string('meta_title')->nullable();
                $table->string('meta_description')->nullable();
                $table->timestamp('published_at')->nullable();
                $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
                $table->unsignedBigInteger('views')->default(0);
                $table->timestamps();
                $table->index(['status', 'published_at']);
            });
        }

        if (!Schema::hasTable('categories')) {
            Schema::create('categories', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('slug')->unique();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('tags')) {
            Schema::create('tags', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('slug')->unique();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('post_tag')) {
            Schema::create('post_tag', function (Blueprint $table) {
                $table->foreignId('post_id')->constrained()->onDelete('cascade');
                $table->foreignId('tag_id')->constrained()->onDelete('cascade');
                $table->primary(['post_id', 'tag_id']);
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('post_tag');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('posts');
    }
};
