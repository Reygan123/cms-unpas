<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ourteams', function (Blueprint $table) {
            $table->string('nidn')->nullable()->after('name');
            $table->string('jabatan_akademik')->nullable()->after('title');
            $table->string('bidang_keahlian')->nullable()->after('jabatan_akademik');
            $table->string('kelompok_keilmuan')->nullable()->after('bidang_keahlian');
            $table->string('link_sinta')->nullable()->after('email');
            $table->string('link_scholar')->nullable()->after('link_sinta');
        });
    }

    public function down(): void
    {
        Schema::table('ourteams', function (Blueprint $table) {
            $table->dropColumn([
                'nidn',
                'jabatan_akademik',
                'bidang_keahlian',
                'kelompok_keilmuan',
                'link_sinta',
                'link_scholar',
            ]);
        });
    }
};