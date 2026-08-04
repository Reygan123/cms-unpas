<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('study_modes', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique(); // reguler | hybrid | pjj | fast-track
            $table->string('nama');
            $table->text('ringkasan')->nullable();
            $table->longText('deskripsi')->nullable();
            $table->longText('karakteristik')->nullable();
            $table->longText('bentuk_pembelajaran')->nullable();
            $table->longText('keunggulan')->nullable();
            $table->longText('persyaratan')->nullable();
            $table->longText('kebutuhan_mahasiswa')->nullable();
            $table->longText('mekanisme')->nullable();
            $table->string('hasil_pendidikan')->nullable();
            $table->string('durasi')->nullable();
            $table->string('image')->nullable();
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('study_modes');
    }
};