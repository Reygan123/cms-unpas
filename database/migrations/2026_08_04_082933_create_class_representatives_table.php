<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('class_representatives', function (Blueprint $table) {
            $table->id();
            $table->string('angkatan');
            $table->string('nama');
            $table->enum('jabatan', ['ketua_angkatan', 'pic_aktivis']);
            $table->foreignId('id_departement')->nullable()->constrained('departements')->nullOnDelete();
            $table->string('foto')->nullable();
            $table->string('kontak')->nullable();
            $table->boolean('status_on_duty')->default(true);
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('class_representatives');
    }
};