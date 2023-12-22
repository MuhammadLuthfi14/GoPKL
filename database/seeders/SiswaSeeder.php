<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Siswa;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 2; $i <= 31; $i++) {
            Siswa::create([
                'user_id' => $i,
                'nama' => $faker->name,
                'kelas' => '12',
                'jurusan_id' => $faker->numberBetween(1, 6),
            ]);
        }
    }
}
