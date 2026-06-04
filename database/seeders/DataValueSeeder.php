<?php

namespace Database\Seeders;

use App\Models\DataValue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
    }
}
