<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MBKMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modelmbkms')->insert([
            ['id' => 1, 'model_mbkm' => 'Pertukaran Pelajar'],
            ['id' => 2, 'model_mbkm' => 'Magang / Praktik Kerja'],
            ['id' => 3, 'model_mbkm' => 'Asistensi Mengajar'],
            ['id' => 4, 'model_mbkm' => 'Riset / Penelitian'],
            ['id' => 5, 'model_mbkm' => 'Proyek Kemanusiaan'],
            ['id' => 6, 'model_mbkm' => 'Kegiatan Wirausaha'],
            ['id' => 7, 'model_mbkm' => 'Studi / Proyek Independen'],
            ['id' => 8, 'model_mbkm' => 'KKN Tematik'],
        ]);
    }
}
