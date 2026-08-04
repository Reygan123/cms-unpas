<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('slug')->unique();
            $table->enum('kategori', [
                'perkuliahan',
                'uts_uas',
                'remedial_sisipan',
                'krs',
                'tugas_akhir',
                'yudisium',
                'wisuda',
                'beasiswa',
                'kampus_berdampak',
                'administrasi_akademik',
            ]);
            $table->date('tanggal_publikasi');
            $table->text('ringkasan')->nullable();
            $table->longText('konten');
            $table->string('lampiran')->nullable();
            $table->string('penulis')->nullable();
            $table->boolean('is_pinned')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('announcements');
    }
};