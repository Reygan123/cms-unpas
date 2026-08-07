<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('career_events', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kegiatan');
            $table->date('tanggal');
            $table->string('waktu');
            $table->string('tempat');
            $table->enum('jenis', [
                'seminar_karier', 'pelatihan_wawancara', 'personal_branding',
                'simulasi_rekrutmen', 'pelatihan_soft_skills', 'pengenalan_profesi',
            ]);
            $table->text('deskripsi')->nullable();
            $table->string('poster')->nullable();
            $table->string('tautan_pendaftaran')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('career_events');
    }
};