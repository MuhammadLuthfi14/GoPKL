<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jurusans = [
            'Pengembangan Perangkat Lunak dan GIM' => 'PPLG',
            'Teknik Jaringan Komputer dan Telekomunikasi' => 'TJKT',
            'Usaha Layanan Pariwisata' => 'ULPW',
            'Pemasaran' => 'Pemasaran',
            'Akuntansi dan Keuangan Lembaga' => 'AKL',
            'Manajemen Perkantoran dan Layanan Bisnis' => 'MPLB',
        ];

        foreach ($jurusans as $nama => $singkatan) {
            Jurusan::create(['nama' => $nama, 'singkatan' => $singkatan]);
        }
    }
}
