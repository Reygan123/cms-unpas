<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('alumni', function (Blueprint $table) {
            $table->string('email')->nullable()->after('nama');
            $table->string('no_hp')->nullable()->after('email');
            $table->text('alamat')->nullable()->after('cerita_sukses');
        });

        Schema::table('alumni', function (Blueprint $table) {
            $table->foreignId('id_departement')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('alumni', function (Blueprint $table) {
            $table->dropColumn(['email', 'no_hp', 'alamat']);
        });
    }
};