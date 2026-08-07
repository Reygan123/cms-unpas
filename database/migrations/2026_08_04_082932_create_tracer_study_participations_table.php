<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tracer_study_participations', function (Blueprint $table) {
            $table->id();
            $table->string('angkatan');
            $table->year('tahun');
            $table->foreignId('id_departement')->nullable()->constrained('departements')->nullOnDelete();
            $table->integer('jumlah_target');
            $table->integer('jumlah_mengisi');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tracer_study_participations');
    }
};