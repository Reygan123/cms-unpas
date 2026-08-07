<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('organization_managements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_student_organization')->constrained('student_organizations')->cascadeOnDelete();
            $table->string('nama');
            $table->enum('jabatan', ['ketua', 'wakil_ketua', 'sekretaris', 'bendahara', 'kepala_bidang']);
            $table->string('nama_bidang')->nullable();
            $table->string('foto')->nullable();
            $table->string('periode_kepengurusan');
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('organization_managements');
    }
};