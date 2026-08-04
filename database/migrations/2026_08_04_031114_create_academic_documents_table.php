<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('academic_documents', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->enum('kategori', ['buku_panduan', 'peraturan']);
            $table->enum('sub_kategori', [
                'skripsi_ta',
                'kp_magang',
                'mbkm',
                'perkuliahan_evaluasi',
                'kemajuan_studi',
                'yudisium_kelulusan',
            ])->nullable();
            $table->string('nomor_dokumen')->nullable();
            $table->string('tahun_akademik')->nullable();
            $table->date('tanggal_terbit')->nullable();
            $table->date('tanggal_berlaku')->nullable();
            $table->enum('status', ['berlaku', 'direvisi', 'dicabut', 'arsip'])->default('berlaku');
            // nullable = berlaku fakultas-wide, bukan spesifik satu prodi
            $table->foreignId('id_departement')->nullable()->constrained('departements')->nullOnDelete();
            $table->string('file');
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('academic_documents');
    }
};