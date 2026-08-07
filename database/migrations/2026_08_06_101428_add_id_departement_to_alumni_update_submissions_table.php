<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('alumni_update_submissions', function (Blueprint $table) {
            $table->foreignId('id_departement')->nullable()->after('id_alumnus')->constrained('departements')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('alumni_update_submissions', function (Blueprint $table) {
            $table->dropForeign(['id_departement']);
            $table->dropColumn('id_departement');
        });
    }
};