<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prodis')->insert([
            ['id' => 1, 'prodi_name' => 'Administrasi Bisnis D3', 'jurusan_id' => 1],
            ['id' => 2, 'prodi_name' => 'Administrasi Bisnis D4', 'jurusan_id' => 1],
            ['id' => 3, 'prodi_name' => 'MICE D4', 'jurusan_id' => 1],
            ['id' => 4, 'prodi_name' => 'BISPRO D4', 'jurusan_id' => 1],
            ['id' => 5, 'prodi_name' => 'Akuntansi D3', 'jurusan_id' => 2],
            ['id' => 6, 'prodi_name' => 'Akuntansi D4', 'jurusan_id' => 2],
            ['id' => 7, 'prodi_name' => 'Keuangan dan Perbankan D3', 'jurusan_id' => 2],
            ['id' => 8, 'prodi_name' => 'Keuangan dan Perbankan D4', 'jurusan_id' => 2],
            ['id' => 9, 'prodi_name' => 'Manajemen Keuangan D4', 'jurusan_id' => 2],
            ['id' => 10, 'prodi_name' => 'Manajemen Pemasaran D3 (WNBK)', 'jurusan_id' => 2],
            ['id' => 11, 'prodi_name' => 'Magister Terapan Rekayasa Teknologi Manufaktur S2', 'jurusan_id' => 4],
            ['id' => 12, 'prodi_name' => 'Magister Terapan Teknik Elektro S2', 'jurusan_id' => 4],
            ['id' => 13, 'prodi_name' => 'Broadband Multimmedia D4', 'jurusan_id' => 5],
            ['id' => 14, 'prodi_name' => 'Instrumentasi dan Kontrol Industri D4', 'jurusan_id' => 5],
            ['id' => 15, 'prodi_name' => 'Teknik Elektronika Industri D3', 'jurusan_id' => 5],
            ['id' => 16, 'prodi_name' => 'Teknik Listrik D3', 'jurusan_id' => 5],
            ['id' => 17, 'prodi_name' => 'Teknik Otomasi Listrik Industri D4', 'jurusan_id' => 5],
            ['id' => 18, 'prodi_name' => 'Teknik Telekomunikasi D3', 'jurusan_id' => 5],
            ['id' => 19, 'prodi_name' => 'Desain Grafis D3', 'jurusan_id' => 6],
            ['id' => 20, 'prodi_name' => 'Desain Grafis D4', 'jurusan_id' => 6],
            ['id' => 21, 'prodi_name' => 'Penerbitan / Jurnalistik D3', 'jurusan_id' => 6],
            ['id' => 22, 'prodi_name' => 'Teknik Grafika D3', 'jurusan_id' => 6],
            ['id' => 23, 'prodi_name' => 'Teknologi Industri Cetak Kemasan D4', 'jurusan_id' => 6],
            ['id' => 24, 'prodi_name' => 'Teknik Informatika D4', 'jurusan_id' => 7],
            ['id' => 25, 'prodi_name' => 'Teknik Komputer Jaringan D1', 'jurusan_id' => 7],
            ['id' => 26, 'prodi_name' => 'Teknik Multimedia dan Jaringan D4', 'jurusan_id' => 7],
            ['id' => 27, 'prodi_name' => 'Teknik Multimedia Digital D4', 'jurusan_id' => 7],
            ['id' => 28, 'prodi_name' => 'Alat Berat D3', 'jurusan_id' => 8],
            ['id' => 29, 'prodi_name' => 'Konversi Energi D3', 'jurusan_id' => 8],
            ['id' => 30, 'prodi_name' => 'Manufaktur D4', 'jurusan_id' => 8],
            ['id' => 31, 'prodi_name' => 'Pembangkit Tenaga Listrik D4', 'jurusan_id' => 8],
            ['id' => 32, 'prodi_name' => 'Teknik Mesin D3', 'jurusan_id' => 8],
            ['id' => 33, 'prodi_name' => 'Konstruksi Gedung D3', 'jurusan_id' => 9],
            ['id' => 34, 'prodi_name' => 'Konstruksi Gedung D4', 'jurusan_id' => 9],
            ['id' => 35, 'prodi_name' => 'Konstruksi Sipil D3', 'jurusan_id' => 9],
            ['id' => 36, 'prodi_name' => 'Teknik Perancangan Jalan Dan Jembatan D4', 'jurusan_id' => 9],
            ['id' => 37, 'prodi_name' => 'MICE D4 PSDKU Demak', 'jurusan_id' => 1],
            ['id' => 38, 'prodi_name' => 'Teknik Mesin D3 PSDKU Demak', 'jurusan_id' => 8],
        ]);
    }
}
