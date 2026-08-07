<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cv_review_requests', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->foreignId('id_departement')->nullable()->constrained('departements')->nullOnDelete();
            $table->enum('jenis_layanan', ['cv', 'portofolio', 'linkedin', 'surat_lamaran']);
            $table->string('file_upload')->nullable();
            $table->text('catatan_pemohon')->nullable();
            $table->enum('status', ['diajukan', 'diproses', 'selesai'])->default('diajukan');
            $table->text('catatan_admin')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cv_review_requests');
    }
};