<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('organization_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_student_organization')->constrained('student_organizations')->cascadeOnDelete();
            $table->string('judul');
            $table->enum('kategori', [
                'periode_kepengurusan', 'ad_art', 'program_kerja',
                'laporan_kegiatan', 'pedoman_organisasi', 'kontak',
            ]);
            $table->string('file');
            $table->year('tahun')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('organization_documents');
    }
};