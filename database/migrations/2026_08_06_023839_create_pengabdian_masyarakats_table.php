<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengabdian_masyarakats', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('slug')->unique();
            $table->string('kategori');
            $table->string('lokasi');
            $table->date('tanggal');
            $table->text('deskripsi');
            $table->string('gambar')->nullable();
            $table->text('dosen_penanggung_jawab')->nullable();
            $table->string('sumber')->nullable();
            $table->enum('status', ['published', 'draft'])->default('published');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengabdian_masyarakats');
    }
};