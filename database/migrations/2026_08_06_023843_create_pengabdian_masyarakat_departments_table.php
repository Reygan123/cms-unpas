<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengabdian_masyarakat_departement', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pengabdian_masyarakat')->constrained('pengabdian_masyarakats', 'id', 'pmd_pengabdian_fk')->cascadeOnDelete();
            $table->foreignId('id_departement')->constrained('departements', 'id', 'pmd_departement_fk')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengabdian_masyarakat_departement');
    }
};