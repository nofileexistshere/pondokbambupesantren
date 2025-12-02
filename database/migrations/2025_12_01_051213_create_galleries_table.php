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
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('type', ['photo', 'video'])->default('photo');
            $table->string('file_path')->nullable(); // for photos
            $table->string('video_url')->nullable(); // for videos (YouTube, etc.)
            $table->string('thumbnail')->nullable();
            $table->enum('category', ['Semua', 'Kegiatan Belajar', 'Olahraga', 'Wisuda', 'Ramadan', 'Fasilitas'])->default('Semua');
            $table->integer('views')->default(0);
            $table->string('duration')->nullable(); // for videos
            $table->integer('sort_order')->default(0);
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};
