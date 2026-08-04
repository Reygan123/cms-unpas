<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('learning_outcomes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_departement')->constrained('departements')->cascadeOnDelete();
            $table->string('kode_cpl');
            $table->enum('kategori', ['sikap', 'pengetahuan', 'keterampilan_umum', 'keterampilan_khusus']);
            $table->text('pernyataan');
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('learning_outcomes');
    }
};