<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ika_ft_profile', function (Blueprint $table) {
            $table->id();
            $table->text('deskripsi');
            $table->longText('struktur_pengurus')->nullable();
            $table->text('kontak')->nullable();
            $table->string('logo')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ika_ft_profile');
    }
};