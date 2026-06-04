<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sliders')->insert([
                'id_departement' => 1,
                'title' => 'Promo Spesial April',
                'description' => 'Dapatkan diskon menarik untuk produk unggulan bulan ini!',
                'image1' => 'images/baner1.jpg',
                'image2' => 'images/baner2.jpg',
                'yt' => 'https://youtube.com/embed/abcd1234',
                'status' => 'active',
                'home' => 'yes',
          
        ]);
    }
}
