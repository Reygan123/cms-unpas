<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ourteams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_departement')->nullable();
            $table->foreign('id_departement')->references('id')->on('departements');
            $table->string('name');
            $table->string('title');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('ig')->nullable();
            $table->string('fb')->nullable();
            $table->string('yt')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('image');
            $table->string('home')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ourteams');
    }
};
