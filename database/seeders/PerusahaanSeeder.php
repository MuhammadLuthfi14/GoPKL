<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Perusahaan;
use Illuminate\Database\Seeder;

class PerusahaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Perusahaan::create([
            'user_id' => '42',
            'nama' => 'PT. ARG Solusi Teknologi',
            'jurusan' => 'PPLG, Pemasaran',
            'alamat' => 'Jalan Puti Bungsu, Padang Utara, Padang, Sumatera Barat',
            'image' => 'image-post/argenesia.png',
        ]);

        Perusahaan::create([
            'user_id' => '43',
            'nama' => 'CV. Mediatama Web Indonesia',
            'jurusan' => 'PPLG, AKL',
            'alamat' => 'Jalan Marapalam, Padang Timur, Padang, Sumatera Barat',
            'image' => 'image-post/mediatama.png',
        ]);

        Perusahaan::create([
            'user_id' => '44',
            'nama' => 'JNE',
            'jurusan' => 'MPLB, AKL',
            'alamat' => 'Jalan Nipah, Padang Barat, Padang, Sumatera Barat',
            'image' => 'image-post/jne.png',
        ]);

        Perusahaan::create([
            'user_id' => '45',
            'nama' => 'APPSKEP',
            'jurusan' => 'PPLG',
            'alamat' => 'Jalan Durian Tarung, Kuranji, Padang, Sumatera Barat',
            'image' => 'image-post/appskep.png',
        ]);

        Perusahaan::create([
            'user_id' => '46',
            'nama' => 'PT. Bank Negara Indonesia',
            'jurusan' => 'PPLG, AKL',
            'alamat' => 'Jalan Kandis Raya, Nanggolo, Padang, Sumatera Barat',
            'image' => 'image-post/bni.png',
        ]);

        Perusahaan::create([
            'user_id' => '47',
            'nama' => 'Budiman Swalayan',
            'jurusan' => 'Pemasaran',
            'alamat' => 'Jalan Sawahan, Padang Timur, Padang, Sumatera Barat',
            'image' => 'image-post/budiman.png',
        ]);

        Perusahaan::create([
            'user_id' => '48',
            'nama' => 'Ino Sport',
            'jurusan' => 'Pemasaran',
            'alamat' => 'Jalan Gajah Mada, Nanggalo, Padang, Sumatera Barat',
            'image' => 'image-post/inosport.png',
        ]);

        Perusahaan::create([
            'user_id' => '49',
            'nama' => 'Universitas Metamedia',
            'jurusan' => 'TJKT, MPLB',
            'alamat' => 'Jalan Khatib Sulaiman, Padang Utara, Padang, Sumatera Barat',
            'image' => 'image-post/metamedia.png',
        ]);

        Perusahaan::create([
            'user_id' => '50',
            'nama' => 'PT. Pegadaian',
            'jurusan' => 'AKL',
            'alamat' => 'Jalan S. Parman, Padang Utara, Padang, Sumatera Barat',
            'image' => 'image-post/pegadaian.png',
        ]);

        Perusahaan::create([
            'user_id' => '51',
            'nama' => 'PT. Trans Retail Indonesia',
            'jurusan' => 'Pemasaran, AKL',
            'alamat' => 'Jalan S. Parman, Padang Utara, Padang, Sumatera Barat',
            'image' => 'image-post/transmart.png',
        ]);
    }
}
