<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('departements', function (Blueprint $table) {
            $table->enum('jenjang', ['S1', 'S2'])->default('S1')->after('slug');
            $table->string('gelar_lulusan')->nullable()->after('jenjang');
            $table->text('keunggulan_prodi')->nullable()->after('gelar_lulusan');
            $table->string('konsentrasi')->nullable()->after('keunggulan_prodi');
            $table->string('durasi_studi')->nullable()->after('konsentrasi');
            $table->string('dokumen_cpl')->nullable()->after('durasi_studi');
        });
    }

    public function down(): void
    {
        Schema::table('departements', function (Blueprint $table) {
            $table->dropColumn([
                'jenjang',
                'gelar_lulusan',
                'keunggulan_prodi',
                'konsentrasi',
                'durasi_studi',
                'dokumen_cpl',
            ]);
        });
    }
};