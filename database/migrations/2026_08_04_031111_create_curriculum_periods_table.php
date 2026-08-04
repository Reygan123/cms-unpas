<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('curriculum_periods', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_departement')->constrained('departements')->cascadeOnDelete();
            $table->string('tahun_kurikulum');
            $table->tinyInteger('jumlah_semester')->default(8);
            $table->integer('total_sks')->nullable();
            $table->text('program_kampus_berdampak')->nullable();
            $table->string('dokumen_file')->nullable();
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('curriculum_periods');
    }
};