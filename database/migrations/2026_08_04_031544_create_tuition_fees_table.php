<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tuition_fees', function (Blueprint $table) {
            $table->id();
            $table->string('tahun_akademik');
            $table->foreignId('id_departement')->constrained('departements')->cascadeOnDelete();
            $table->enum('jenjang', ['S1', 'S2']);
            $table->enum('jenis_program', ['reguler', 'hybrid', 'pjj', 'fast_track']);
            $table->tinyInteger('semester')->nullable(); // null = biaya sekali bayar
            $table->string('jenis_biaya'); // SPP, Uang Pangkal, Biaya SKS, dst
            $table->decimal('nominal', 12, 2);
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tuition_fees');
    }
};