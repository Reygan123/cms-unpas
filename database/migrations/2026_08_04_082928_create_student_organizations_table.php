<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('student_organizations', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('singkatan');
            $table->string('slug')->unique();
            $table->foreignId('id_departement')->nullable()->constrained('departements')->nullOnDelete();
            $table->string('logo')->nullable();
            $table->text('deskripsi_singkat')->nullable();
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->text('tujuan')->nullable();
            $table->text('nilai_organisasi')->nullable();
            $table->text('ruang_lingkup')->nullable();
            $table->string('ketua')->nullable();
            $table->string('periode_kepengurusan')->nullable();
            $table->text('media_sosial')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_organizations');
    }
};