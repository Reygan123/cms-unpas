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
        Schema::create('identities', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('meta');
            $table->text('adress');
            $table->text('link_map');
            $table->string('phone');
            $table->string('email');
            $table->string('fb');
            $table->string('ig');
            $table->string('tiktok');
            $table->string('yt');
            $table->string('time_service');
            $table->string('day_service');
            $table->string('image1');
            $table->string('image2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('identities');
    }
};
