<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('accreditations', function (Blueprint $table) {
            $table->id();
            // nullable = akreditasi tingkat fakultas (bukan per prodi)
            $table->foreignId('id_departement')->nullable()->constrained('departements')->nullOnDelete();
            $table->enum('jenjang', ['S1', 'S2'])->nullable();
            $table->string('lembaga');
            $table->string('status');
            $table->string('nomor_sk');
            $table->date('tanggal_berlaku');
            $table->date('masa_berlaku_sampai')->nullable();
            $table->string('sertifikat_file')->nullable();
            $table->string('dokumen_pendukung')->nullable();
            $table->boolean('is_public')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('accreditations');
    }
};