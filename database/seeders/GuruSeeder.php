<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Guru::create([
            'user_id' => '32',
            'nama' => 'Hidayati',
            'jabatan_id' => '2',
        ]);

        Guru::create([
            'user_id' => '33',
            'nama' => 'Juni Advan',
            'jabatan_id' => '3',
        ]);

        Guru::create([
            'user_id' => '34',
            'nama' => 'Siti Zizi Fauziah',
            'jabatan_id' => '4',
        ]);

        Guru::create([
            'user_id' => '35',
            'nama' => 'Asmarni',
            'jabatan_id' => '5',
        ]);

        Guru::create([
            'user_id' => '36',
            'nama' => 'Nuraini',
            'jabatan_id' => '6',
        ]);

        Guru::create([
            'user_id' => '37',
            'nama' => 'Erlin Nazar',
            'jabatan_id' => '2',
        ]);

        Guru::create([
            'user_id' => '38',
            'nama' => 'Widi Izra',
            'jabatan_id' => '3',
        ]);

        Guru::create([
            'user_id' => '39',
            'nama' => 'Ernawaty',
            'jabatan_id' => '4',
        ]);

        Guru::create([
            'user_id' => '40',
            'nama' => 'Afrida',
            'jabatan_id' => '5',
        ]);

        Guru::create([
            'user_id' => '41',
            'nama' => 'Yenita',
            'jabatan_id' => '6',
        ]);
    }
}
