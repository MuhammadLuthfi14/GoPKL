<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jabatans = [
            'Kepala Sekolah',
            'Waka Bidang Humas',
            'Waka Bidang Kurikulum',
            'Waka Bidang Kesiswaan',
            'Waka Sarana Prasaranan',
            'Guru',
        ];

        foreach ($jabatans as $jabatan) {
            Jabatan::create(['nama' => $jabatan]);
        }
    }
}
