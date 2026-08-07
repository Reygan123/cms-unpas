<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('organization_galleries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_student_organization')->constrained('student_organizations')->cascadeOnDelete();
            $table->enum('tipe', ['foto', 'video']);
            $table->string('file');
            $table->string('caption')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('organization_galleries');
    }
};