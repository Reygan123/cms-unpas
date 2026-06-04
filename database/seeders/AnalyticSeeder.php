<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AnalyticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('analytics')->insert([
            'google' => 'ini contoh google analytic',
            'meta'   => 'Deskripsi website kamu',
            'chat'   => 'Hallo Minpas, Saya mau info pendaftaran mahasiswa baru untuk tahun ini!',
        ]);
    }
}
