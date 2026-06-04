<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DepartementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departements')->insert(
            [
            'id_profil_fakultas' => 1, // pastikan ID ini sesuai di tabel relasinya
            'name' => 'Fakultas Teknik',
            'akreditasi' => 'A',
            'tagline' => 'Mewujudkan Insinyur Berkarakter',
            'yt' => 'https://youtube.com/example',
            'statistik1' => '10.000 Mahasiswa',
            'statistik2' => '50 Dosen',
            'statistik3' => '20 Program Studi',
            'statistik4' => '5 Gedung Kuliah',
            'title1' => 'Visi',
            'title2' => 'Misi',
            'title3' => 'Tujuan',
            'title4' => 'Nilai',
            'description1' => 'Menjadi fakultas teknik unggulan tingkat nasional.',
            'description2' => 'Menyelenggarakan pendidikan, penelitian, dan pengabdian.',
            'description3' => 'Membentuk lulusan yang berdaya saing global.',
            'description4' => 'Integritas, Profesionalisme, Inovasi.',
            'status' => 'aktif',
            ], 
    );
    }
}
