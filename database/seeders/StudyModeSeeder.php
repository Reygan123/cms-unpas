<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\StudyMode;

class StudyModeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modes = [
            [
                'nama' => 'Reguler',
                'ringkasan' => 'Program perkuliahan standar dengan tatap muka secara penuh di kampus.',
                'durasi' => '8 Semester',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Hybrid',
                'ringkasan' => 'Kombinasi antara perkuliahan tatap muka (offline) dan pembelajaran daring (online).',
                'durasi' => '8 Semester',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'PJJ (Pendidikan Jarak Jauh)',
                'ringkasan' => 'Program perkuliahan yang sepenuhnya dilakukan secara daring (online) menggunakan sistem e-learning.',
                'durasi' => '8 Semester',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Fast-Track',
                'ringkasan' => 'Program akselerasi berprestasi untuk menyelesaikan program S1 dan S2 dalam waktu yang lebih singkat.',
                'durasi' => '10 Semester (S1+S2)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Kelas Karyawan / Eksekutif',
                'ringkasan' => 'Program perkuliahan yang disesuaikan dengan waktu pekerja, biasanya di malam hari atau akhir pekan.',
                'durasi' => '8 Semester',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Jika Anda menggunakan Model:
        // foreach ($modes as $mode) {
        //     StudyMode::updateOrCreate(['nama' => $mode['nama']], $mode);
        // }

        // Menggunakan Query Builder sebagai default yang aman:
        DB::table('study_modes')->insert($modes);
    }
}
