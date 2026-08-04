<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('agendas', function (Blueprint $table) {
            // 'category' (string, existing) dipakai untuk nilai:
            // registrasi | perwalian | awal-perkuliahan | uts | uas |
            // batas-input-nilai | kerja-praktik | tugas-akhir |
            // yudisium | wisuda | libur-akademik
            $table->boolean('is_academic_calendar')->default(false)->after('category');
        });
    }

    public function down(): void
    {
        Schema::table('agendas', function (Blueprint $table) {
            $table->dropColumn('is_academic_calendar');
        });
    }
};