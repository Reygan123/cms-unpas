<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('alumni', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_departement')->constrained('departements')->cascadeOnDelete();
            $table->string('nama');
            $table->string('foto')->nullable();
            $table->string('angkatan')->nullable();
            $table->year('tahun_lulus')->nullable();
            $table->string('profesi')->nullable();
            $table->string('perusahaan')->nullable();
            $table->text('cerita_sukses')->nullable();
            $table->string('home')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alumni');
    }
};