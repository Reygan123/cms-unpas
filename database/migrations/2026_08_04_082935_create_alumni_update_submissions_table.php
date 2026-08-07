<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('alumni_update_submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_alumnus')->nullable()->constrained('alumni')->nullOnDelete();
            $table->string('nama');
            $table->string('email');
            $table->string('no_hp')->nullable();
            $table->string('angkatan')->nullable();
            $table->year('tahun_lulus')->nullable();
            $table->string('profesi_terkini')->nullable();
            $table->string('perusahaan')->nullable();
            $table->text('alamat')->nullable();
            $table->enum('status', ['pending', 'approved'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alumni_update_submissions');
    }
};