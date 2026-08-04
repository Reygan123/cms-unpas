<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tracer_studies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_departement')->constrained('departements')->cascadeOnDelete();
            $table->year('tahun');
            $table->string('label'); // contoh: "Masa Tunggu Kerja", "Kesesuaian Bidang Kerja"
            $table->decimal('nilai', 8, 2);
            $table->string('satuan')->nullable(); // %, bulan, dst
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tracer_studies');
    }
};