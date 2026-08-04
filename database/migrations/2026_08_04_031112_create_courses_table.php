<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_curriculum_period')->constrained('curriculum_periods')->cascadeOnDelete();
            $table->tinyInteger('semester');
            $table->string('kode');
            $table->string('nama');
            $table->tinyInteger('sks');
            $table->enum('jenis', ['wajib', 'pilihan', 'rekognisi'])->default('wajib');
            $table->string('prasyarat')->nullable();
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};