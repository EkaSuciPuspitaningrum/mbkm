<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jurusans')->insert([
            ['id' => 1, 'jurusan_name' => 'Administrasi Bisnis'],
            ['id' => 2, 'jurusan_name' => 'Akuntansi'],
            ['id' => 3, 'jurusan_name' => 'BISPRO'],
            ['id' => 4, 'jurusan_name' => 'Pascasarjana'],
            ['id' => 5, 'jurusan_name' => 'Teknik Elektro'],
            ['id' => 6, 'jurusan_name' => 'Teknik Grafika dan Penerbitan'],
            ['id' => 7, 'jurusan_name' => 'Teknik Informatika dan Komputer'],
            ['id' => 8, 'jurusan_name' => 'Teknik Mesin'],
            ['id' => 9, 'jurusan_name' => 'Teknik Sipil'],
            ['id' => 10, 'jurusan_name' => 'Direktorat'],
        ]);
    }
}
