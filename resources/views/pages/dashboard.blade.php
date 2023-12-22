<title>Home</title>
@extends('layouts.user.main')
@section('content')
    @php
        $jumlahSiswa = DB::table('siswas')->count();
        $jumlahGuru = DB::table('gurus')->count();
        $jumlahPerusahaan = DB::table('perusahaans')->count();
    @endphp

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white dark:bg-gray-800 sm:rounded-lg">
                {{-- welcome siswa --}}
                @role('siswa')
                    <div class="flex justify-center pt-5 pb-16">
                        @foreach (Auth::user()->siswa as $siswa)
                            <div class="flex gap-3 text-xl font-extrabold sm:text-2xl md:text-4xl lg:text-5xl">
                                <p>Selamat Datang</p>
                                <p class="text-success">{{ $siswa->nama }}</p>
                            </div>
                        @endforeach
                    </div>
                @endrole
                {{-- welcome guru --}}
                @role('guru')
                    <div class="flex justify-center gap-3 pt-5 pb-16">
                        @foreach (Auth::user()->guru as $guru)
                            <div class="flex gap-3 text-xl font-extrabold sm:text-2xl md:text-4xl lg:text-5xl">
                                <p>Selamat Datang</p>
                                <p class="text-success">{{ $guru->nama }}</p>
                            </div>
                        @endforeach
                    </div>
                @endrole
                {{-- welcome perusahaan --}}
                @role('perusahaan')
                    <div class="flex justify-center gap-3 pt-5 pb-16">
                        @foreach (Auth::user()->perusahaan as $perusahaan)
                            <div class="flex gap-3 text-xl font-extrabold sm:text-2xl md:text-4xl lg:text-5xl">
                                <p>Selamat Datang</p>
                                <p class="text-success">{{ $perusahaan->nama }}</p>
                            </div>
                        @endforeach
                    </div>
                @endrole
                {{-- go pkl --}}
                <div class="items-center pt-5 pb-20 border-b-2 flex-row lg:flex">
                    <div class="flex justify-center items-center w-[100%]">
                        <img src="/assets/images/gopkl.png" alt="go-pkl" class="duration-300 hover:scale-105">
                    </div>
                    <div class="pt-10">
                        <p class="mb-5 font-bold text-center text-3xl lg:text-6xl lg:text-left">Go PKL</p>
                        <p class="text-center text- lg:text-lg lg:text-left p-2">Sebuah website
                            yang
                            bertujuan untuk memudahkan
                            sekolah dan perusahaan dalam mengelola Praktek Kerja Lapangan para siswa yang nantinya akan
                            menjadi generasi emas untuk masa yang akan datang
                        </p>
                        <div class="flex justify-center items-center">
                            @role('siswa')
                                <a href="{{ route('siswa.index') }}"
                                    class="btn bg-[#3CBA78] hover:bg-[#3CBA78] hover:bg-opacity-30 rounded-md hover:scale-105 duration-300 mt-5 text-white hover:text-success">Daftar
                                    Perusahaan</a>
                            @endrole
                            @role('guru')
                                <a href="{{ route('guru.index') }}"
                                    class="btn bg-[#3CBA78] hover:bg-[#3CBA78] hover:bg-opacity-30 rounded-md hover:scale-105 duration-300 mt-5 text-white hover:text-success">Terima
                                    Siswa</a>
                            @endrole
                            @role('perusahaan')
                                <a href="{{ route('perusahaan.index') }}"
                                    class="btn bg-[#3CBA78] hover:bg-[#3CBA78] hover:bg-opacity-30 rounded-md hover:scale-105 duration-300 mt-5 text-white hover:text-success">Terima
                                    Siswa</a>
                            @endrole
                        </div>
                    </div>
                </div>
                {{-- FAQ --}}
                <div class="pt-20 pb-5 place-items-center grid gap-5 lg:flex">
                    @role('siswa')
                        <div
                            class="m-3 max-w-sm lg:max-w-md p-10 text-center duration-300 border-2 rounded-md border-success hover:scale-95">
                            <p class="font-bold capitalize">Bagaimana Cara Mendaftar Ke Perusahaan di Go PKL?</p><br>
                            <p>Kalian bisa mendaftar dengan menekan tombol daftar perusahaan atau
                                langsung ke halaman
                                pendaftaran PKL</p>
                        </div>
                    @endrole
                    @role('guru')
                        <div
                            class="m-3 max-w-sm lg:max-w-md p-10 text-center duration-300 border-2 rounded-md border-success hover:scale-95">
                            <p class="font-bold capitalize">Bagaimana Cara Mendaftar Ke Perusahaan di Go PKL?</p><br>
                            <p>Kalian bisa mendaftar dengan menekan tombol daftar perusahaan atau
                                langsung ke halaman
                                pendaftaran PKL</p>
                        </div>
                    @endrole
                    @role('perusahaan')
                        <div
                            class="m-3 max-w-sm lg:max-w-md p-10 text-center duration-300 border-2 rounded-md border-success hover:scale-95">
                            <p class="font-bold capitalize">Bagaimana Cara Mendaftar Ke Perusahaan di Go PKL?</p><br>
                            <p>Kalian bisa mendaftar dengan menekan tombol daftar perusahaan atau
                                langsung ke halaman
                                pendaftaran PKL</p>
                        </div>
                    @endrole
                    <div
                        class="m-3 max-w-sm lg:max-w-md p-10 text-center duration-300 border-2 rounded-md border-success hover:scale-95">
                        <p class="font-bold capitalize">Apa yang harus dilakukan jika terdapat kesalahan dalam memasukkan
                            data?</p><br>
                        <p>Pengguna bisa melaporkan kepada admin. Setelah itu admin akan memproses ulang data tersebut, tapi
                            usahakan tidak salah dalam penginputan data. Karena akan memperpanjang atau memperlama proses
                        </p>
                    </div>
                    <div
                        class="m-3 max-w-sm lg:max-w-md p-10 text-center duration-300 border-2 rounded-md border-success hover:scale-95">
                        <p class="font-bold capitalize">Berapa lama proses verifikasi akun dari admin?</p><br>
                        <p>Untuk verifikasi akun sendiri akan di proses sekitar 2-5 menit untuk jam kerja. Apabila tidak
                            dijam kerja, maka itu akan terjadi lebih lama</p>
                    </div>
                </div>
                {{-- Jumlah Data --}}
                <div
                    class="grid lg:grid-cols-3 gap-5 py-20 text-sm text-gray-900 justify-items-center md:gap-10 md:text-base dark:text-gray-100">
                    <div
                        class="flex items-center justify-center bg-[#3CBA78] w-[300px] h-[200px] rounded-[20px] text-white hover:scale-105 duration-300 shadow-2xl">
                        <div class="flex flex-col items-center gap-7">
                            <div class="flex gap-5">
                                <i class="text-4xl fa-solid fa-users"></i>
                                <p class="text-4xl">{{ $jumlahSiswa }}</p>
                            </div>
                            <p>Jumlah Siswa</p>
                        </div>
                    </div>
                    <div
                        class="flex justify-center items-center bg-[#3CBA78] w-[300px] h-[200px] rounded-[20px] text-white hover:scale-105 duration-300 shadow-2xl">
                        <div class="flex flex-col items-center gap-7">
                            <div class="flex gap-5">
                                <i class="text-4xl fas fa-chalkboard"></i>
                                <p class="text-4xl">{{ $jumlahGuru }}</p>
                            </div>
                            <p>Jumlah Guru</p>
                        </div>
                    </div>
                    <div
                        class="flex justify-center items-center bg-[#3CBA78] w-[300px] h-[200px] rounded-[20px] text-white hover:scale-105 duration-300 shadow-2xl">
                        <div class="flex flex-col items-center gap-7">
                            <div class="flex gap-5">
                                <i class="text-4xl fas fa-industry"></i>
                                <p class="text-4xl">{{ $jumlahPerusahaan }}</p>
                            </div>
                            <p>Jumlah Perusahaan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-success">
        <div class="py-5 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <p class="text-2xl font-bold text-center text-white capitalize pb-3">about us</p>
            <div class="flex justify-around text-white">
                <div class="flex flex-col items-center">
                    <p class="font-bold">Husnul Fikri Averus</p>
                    <p>UI/UX</p>
                    <div class="flex gap-3 mt-2">
                        <a href="https://www.facebook.com/husnulfkrialferues" target="_blank" rel="noopener noreferrer">
                            <i
                                class="bg-white p-1 rounded-md text-success fa-brands fa-facebook hover:scale-150 duration-300"></i>
                        </a>
                        <a href="https://www.instagram.com/fikri_averus/" target="_blank" rel="noopener noreferrer">
                            <i
                                class="bg-white p-1 rounded-md text-success fa-brands fa-instagram hover:scale-150 duration-300"></i>
                        </a>
                        <a href="https://github.com/chqrety" target="_blank" rel="noopener noreferrer">
                            <i
                                class="bg-white p-1 rounded-md text-success fa-brands fa-github hover:scale-150 duration-300"></i>
                        </a>
                        <a href="https://mail.google.com/mail/?view=cm&fs=1&to=fikriaverus23@gmail.com" target="_blank">
                            <i
                                class="bg-white p-1 rounded-md text-success fa-solid fa-envelope hover:scale-150 duration-300"></i>
                        </a>
                    </div>
                </div>
                <div class="flex flex-col items-center">
                    <p class="font-bold">Muhammad Luthfi</p>
                    <p>Front End Developer</p>
                    <div class="flex gap-3 mt-2">
                        <i
                            class="p-1 duration-300 bg-white rounded-md text-success fa-brands fa-facebook hover:scale-150"></i>
                        <i
                            class="p-1 duration-300 bg-white rounded-md text-success fa-brands fa-instagram hover:scale-150"></i>
                        <i
                            class="p-1 duration-300 bg-white rounded-md text-success fa-brands fa-github hover:scale-150"></i>
                        <i
                            class="p-1 duration-300 bg-white rounded-md text-success fa-solid fa-envelope hover:scale-150"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
