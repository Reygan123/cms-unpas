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
        Schema::create('inovations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_departement')->nullable();
            $table->foreign('id_departement')->references('id')->on('departements');
            $table->string('title');
            $table->string('name');
            $table->text('description');
            $table->string('home')->nullable();
            $table->string('image1');
            $table->string('image2')->nullable();
            $table->string('inovator')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inovations');
    }
};
