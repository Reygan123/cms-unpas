<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('campus_activities', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('slug')->unique();
            $table->string('gambar')->nullable();
            $table->date('tanggal');
            $table->string('penyelenggara')->nullable();
            $table->enum('kategori', [
                'kegiatan_kemahasiswaan',
                'pengabdian_masyarakat',
                'lomba_kompetisi',
                'seminar_workshop',
                'olahraga',
                'seni_budaya',
                'suasana_kampus',
            ]);
            $table->text('ringkasan')->nullable();
            $table->longText('konten');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('campus_activities');
    }
};