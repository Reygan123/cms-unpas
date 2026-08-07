<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('alumni_networking_resources', function (Blueprint $table) {
            $table->id();
            $table->enum('tipe', ['video_sharing', 'komunitas_profesi']);
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->string('url')->nullable();
            $table->string('bidang')->nullable();
            $table->string('thumbnail')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alumni_networking_resources');
    }
};