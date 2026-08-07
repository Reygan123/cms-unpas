<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('organization_programs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_student_organization')->constrained('student_organizations')->cascadeOnDelete();
            $table->enum('kategori', [
                'pengembangan_organisasi', 'kaderisasi', 'keilmuan_keprofesian',
                'pengabdian_masyarakat', 'minat_bakat', 'kesejahteraan_mahasiswa',
                'kewirausahaan', 'komunikasi_informasi',
            ]);
            $table->string('nama_program');
            $table->text('deskripsi')->nullable();
            $table->date('tanggal_pelaksanaan')->nullable();
            $table->enum('status', ['direncanakan', 'berjalan', 'selesai'])->default('direncanakan');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('organization_programs');
    }
};