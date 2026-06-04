<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\DataValue;
use App\Models\Identity;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
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
      
        DataValue::create([
            'title1' => 'Mahasiswa',
            'title2' => 'Lulusan',
            'title3' => 'Program Studi',
            'title4' => 'Prestasi',

            'data1' => '9112',
            'data2' => '9877436',
            'data3' => '44',
            'data4' => '2139',

            'value1' => 'Some value 1',
            'value2' => 'Some value 2',
            'value3' => 'Some value 3',
            'value4' => 'Some value 4',
        ]);
        DB::table('analytics')->insert([
            'google' => 'ini contoh google analytic',
            'meta'   => 'Deskripsi website kamu',
            'chat'   => 'Hallo Minpas, Saya mau info pendaftaran mahasiswa baru untuk tahun ini!',
        ]);
        DB::table('users')->insert([
            [
                'name' => 'Kemal Ramadhan',
                'email' => 'km.kemal03@gmail.com',
                'phone' => '08986004677',
                'role' => 'Super Admin',
                'email_verified_at' => now(),
                'password' => Hash::make('Kk1617102084'),

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Admin User',
                'email' => 'rickybackup2121@gmail.com',
                'phone' => '08123456789',
                'role' => 'admin',
                'email_verified_at' => now(),
                'password' => Hash::make('password'), // pastikan password di-hash

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Regular User',
                'email' => 'user@example.com',
                'phone' => '08987654321',
                'role' => 'admin',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),

                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('categories')->insert([
            ['id' => 1, 'name' => 'Artikel', 'image' => 'images/categories/article.jpg'],
            ['id' => 2, 'name' => 'Berita', 'image' => 'images/categories/news.jpg'],
        ]);

        DB::table('posts')->insert([
            [
                'id_category' => 1,
                'title' => 'Cara Menggunakan Laravel',
                'resume' => 'Panduan singkat cara menggunakan Laravel.',
                'content' => '<p>Laravel adalah framework PHP yang sangat powerful...</p>',
                'publish' => '2023-10-21',
                'status' => 'active',
                'image' => 'images/posts/post1.jpg',
                'yt' => 'https://www.youtube.com/watch?v=video1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_category' => 2,
                'title' => 'Tips Belajar Quill Editor',
                'resume' => 'Cara integrasi Quill Editor di Laravel.',
                'content' => '<p>Quill adalah rich text editor yang ringan dan mudah digunakan...</p>',
                'publish' => '2023-10-21',
                'status' => 'active',
                'image' => 'images/posts/post2.jpg',
                'yt' => 'https://www.youtube.com/watch?v=video2',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
       
    }
}
