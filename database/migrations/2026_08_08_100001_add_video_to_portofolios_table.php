<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('portofolios', function (Blueprint $table) {
            $table->string('video')->nullable()->after('yt');
        });
    }

    public function down(): void
    {
        Schema::table('portofolios', function (Blueprint $table) {
            $table->dropColumn('video');
        });
    }
};
