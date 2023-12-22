<?php

namespace Database\Seeders;

use App\Models\Persyaratan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersyaratanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Persyaratan::create([
            'deskripsi' => 'Seluruh siswa harus menuntaskan nilai dari semester 1 sampai semester 5'
        ]);

        Persyaratan::create([
            'deskripsi' => 'Seluruh Siswa harus melunasi iuran komite sampai batas yang telah ditentukan'
        ]);

        Persyaratan::create([
            'deskripsi' => 'Seluruh siswa harus mengumpulkan surat persetujuan orang tua'
        ]);

        Persyaratan::create([
            'deskripsi' => 'Seluruh siswa harus merapikan diri, seperti memotong rambut dan memotong kuku dan lain sebagainya'
        ]);
    }
}
