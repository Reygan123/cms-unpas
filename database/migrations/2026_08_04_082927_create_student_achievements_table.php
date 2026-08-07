<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('student_achievements', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->foreignId('id_departement')->nullable()->constrained('departements')->nullOnDelete();
            $table->string('nama_kompetisi');
            $table->enum('kategori', [
                'akademik', 'nonakademik', 'penelitian', 'inovasi', 'pkm',
                'kewirausahaan', 'debat', 'seni_budaya', 'olahraga', 'pengabdian_masyarakat',
            ]);
            $table->enum('tingkat', [
                'program_studi', 'fakultas', 'universitas', 'regional', 'nasional', 'internasional',
            ]);
            $table->string('peringkat')->nullable();
            $table->year('tahun');
            $table->string('dosen_pembimbing')->nullable();
            $table->string('penyelenggara')->nullable();
            $table->string('foto')->nullable();
            $table->string('dokumen_pendukung')->nullable();
            $table->text('deskripsi')->nullable();
            $table->enum('status', ['pending', 'verified', 'rejected'])->default('pending');
            $table->string('submitted_by_name')->nullable();
            $table->string('submitted_by_email')->nullable();
            $table->timestamp('verified_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_achievements');
    }
};