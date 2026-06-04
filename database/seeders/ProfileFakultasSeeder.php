<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProfileFakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('profile_fakultas')->insert([
            'name' => 'Fakultas Teknik',
            'tagline' => 'Mewujudkan Insinyur Berkarakter',
            'title1' => 'Visi',
            'description1' => 'Menjadi fakultas teknik unggulan tingkat nasional.',
            'title2' => 'Misi',
            'description2' => 'Menyelenggarakan pendidikan, penelitian, dan pengabdian.',
            'title3' => 'Tujuan',
            'description3' => 'Membentuk lulusan yang berdaya saing global.',
            'title4' => 'Nilai',
            'description4' => 'Integritas, Profesionalisme, Inovasi.',
            'image1' => 'image1.jpg',
            'image2' => 'image2.jpg',
            'image3' => 'image3.jpg',
            'image4' => 'image4.jpg',
            'statistik1' => '10.000 Mahasiswa',
            'statistik2' => '50 Dosen',
            'statistik3' => '20 Program Studi',
            'statistik4' => '5 Gedung Kuliah',
            'status' => 'aktif',
            'yt' => 'https://youtube.com/example'
        ]);
    }
}
