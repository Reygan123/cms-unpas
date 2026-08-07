<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('internships', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lowongan');
            $table->string('perusahaan');
            $table->text('persyaratan');
            $table->date('batas_pendaftaran');
            $table->string('lokasi');
            $table->string('durasi');
            $table->text('prodi_relevan')->nullable();
            $table->string('poster')->nullable();
            $table->string('tautan_pendaftaran')->nullable();
            $table->enum('status', ['aktif', 'ditutup'])->default('aktif');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('internships');
    }
};