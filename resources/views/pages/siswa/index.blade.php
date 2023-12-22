<title>Pendaftaran PKL</title>
@extends('layouts.user.main')
@section('content')
    <div class="py-12 overflow-x-hidden">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div
                class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 text-sm text-gray-900 gap-x-6 xl:gap-x-28 gap-y-4 justify-items-center md:text-base dark:text-gray-100">
                @foreach ($perusahaans as $perusahaan)
                    <div
                        class="flex justify-start items-center gap-x-3 gap-y-5 w-[310px] h-[160px] md:w-[360px] md:h-[175px] lg:w-[430px] lg:h-[205px] rounded-[10px] text-black border border-[#B4B4B3]">
                        <div>
                            <img class="w-[100px] h-[100px] lg:w-[124.24px] lg:h-[124.24px] rounded-[10px] mx-2 md:mx-4"
                                src="{{ asset('storage/' . $perusahaan->image) }}" alt="Logo Perusahaan">
                        </div>
                        <div class="flex flex-col gap-2">
                            <h1 class="flex flex-col text-base lg:text-xl font-bold">{{ $perusahaan->nama }}</h1>
                            <p class="flex text-xs lg:text-sm">{{ $perusahaan->jurusan }}</p>
                            <div class="relative z-50 ">
                                <div x-data="{ fullscreenModal: false }" x-init="$watch('fullscreenModal', function(value) {
                                            if (value === true) {
                                                document.body.classList.add('overflow-hidden');
                                            } else {
                                                document.body.classList.remove('overflow-hidden');
                                            }
                                            @keydown.escape ="fullscreenModal=false">
                                    @php
                                        $totalPendaftaranSiswa = \App\Models\Permohonan::where('siswa_id', $siswas->id)->count();
                                        $totalPendaftaranKePerusahaan = \App\Models\Permohonan::where('siswa_id', $siswas->id)
                                            ->where('perusahaan_id', $perusahaan->id)
                                            ->count();
                                    @endphp

                                    @if ($totalPendaftaranKePerusahaan >= 1)
                                        <button disabled readonly class="font-semibold rounded-md text-[11px] md:btn md:btn-xs bg-gray-300 px-2 "
                                            style="color: black">Sudah
                                            Mendaftar</button>
                                    @elseif ($totalPendaftaranSiswa >= 2)
                                        <button disabled readonly class="font-semibold rounded-md text-[11px] md:btn md:btn-xs bg-gray-300 px-2"
                                            style="color: black">Batas Pendaftaran
                                            Terpenuhi</button>
                                    @else
                                        <button @click="fullscreenModal=true"
                                            class="font-medium uppercase rounded-md text-[11px] md:btn md:btn-xs bg-[#3D655D] md:bg-[#3D655D] px-2 hover:scale-105 duration-300 text-white md:text-white">Cek
                                            Pendaftaran</button>
                                    @endif
                                    <template x-teleport="body">
                                        <div x-show="fullscreenModal" x-transition:enter="transition ease-out duration-300"
                                            x-transition:enter-start="translate-y-full"
                                            x-transition:enter-end="translate-y-0"
                                            x-transition:leave="transition ease-in duration-300"
                                            x-transition:leave-start="translate-y-0"
                                            x-transition:leave-end="translate-y-full"
                                            class="flex fixed z-[99] w-screen  inset-0 h-screen bg-black/40">
                                            <button @click="fullscreenModal=false" class="absolute z-30 top-2 right-2 ">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="white" class="w-10 h-10">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                            <div class="relative flex flex-wrap items-center w-full h-full ">
                                                <div class="bg-white overflow-y-auto w-full h-[90%] absolute left-0 right-0 bottom-0">
                                                    <form action="{{ route('permohonan.store') }}" method="POST"
                                                        class="grid items-center w-full h-full grid-cols-1 md:grid-cols-2 xl:gap-x-[90px] gap-x-[55px] gap-y-6 py-5 top-30">
                                                        @csrf
                                                        <input type="hidden" value="{{ $perusahaan->id }}"
                                                            name="perusahaan_id">

                                                        <div class="flex flex-col md:flex-row justify-center items-center gap-2 col-span-1 md:col-span-2">
                                                            <img class="w-[100px] h-[100px] md:w-[130px] md:h-[130px] xl:w-[194px] xl:h-[190px] rounded-[10px]"
                                                                src="{{ asset('storage/' . $perusahaan->image) }}"
                                                                alt="Logo Perusahaan">
                                                            <h1
                                                                class="text-xl md:text-2xl xl:text-5xl font-bold capitalize">
                                                                {{ $perusahaan->nama }}
                                                            </h1>
                                                        </div>

                                                        <div class="flex flex-col col-span-1 justify-self-center md:justify-self-end">
                                                            <label for="nama">Nama Siswa</label>
                                                            <input type="text" id="nama" name="nama"
                                                                value="{{ $siswas->nama }}" readonly
                                                                class="p-2 border w-[300px] xl:w-[469px] border-[#787A91] rounded-md focus:outline-none">

                                                        </div>

                                                        <div class="flex flex-col col-span-1 justify-self-center md:justify-self-start">
                                                            <label for="jurusan">Jurusan</label>
                                                            <input type="text" id="jurusan" name="jurusan" readonly
                                                                value="{{ $siswas->jurusan->nama }}"
                                                                class="p-2 border w-[300px] xl:w-[469px]  border-[#787A91] rounded-md focus:outline-none">
                                                        </div>

                                                        <div class="flex flex-col col-span-1 justify-self-center md:justify-self-end">
                                                            <label for="tgl_mulai">Tanggal Mulai</label>
                                                            <input type="date" id="tgl_mulai" name="tgl_mulai"
                                                                class="p-2 border w-[300px] xl:w-[469px] border-[#787A91] rounded-md focus:outline-none">
                                                        </div>

                                                        <div class="flex flex-col col-span-1 justify-self-center md:justify-self-start">
                                                            <label for="tgl_selesai">Tanggal Selesai</label>
                                                            <input type="date" id="tgl_selesai" name="tgl_selesai"
                                                                class="p-2 border w-[300px] xl:w-[469px] border-[#787A91] rounded-md focus:outline-none">
                                                        </div>

                                                        <div class="flex flex-col col-span-1 justify-self-center md:justify-self-end">
                                                            <label for="alamat">Alamat Perusahaan</label>
                                                            <textarea name="alamat" id="alamat" readonly
                                                                class="textarea textarea-bordered w-[300px] xl:w-[469px] border-[#787A91] rounded-md focus:outline-none bg-white">{{ $perusahaan->alamat }}</textarea>
                                                        </div>

                                                        <div class="flex flex-col col-span-1 justify-self-center md:justify-self-start">
                                                            <label for="durasi_pkl">Durasi PKL</label>
                                                            <select name="durasi_pkl" id="durasi_pkl_{{ $perusahaan->id }}"
                                                                class="rounded-md w-[300px] xl:w-[469px] input focus:outline-none" required>
                                                                <option disabled selected>Silahkan pilih durasi pkl
                                                                </option>
                                                                <option>1 Bulan</option>
                                                                <option>2 Bulan</option>
                                                                <option>3 Bulan</option>
                                                                <option>4 Bulan</option>
                                                                <option>5 Bulan</option>
                                                                <option>6 Bulan</option>
                                                            </select>
                                                        </div>

                                                        <button type="submit"
                                                            class="w-[300px] md:w-[655px] xl:w-[1030px] bg-[#3D655D] col-span-1 md:col-span-2 py-2 justify-self-center rounded-md text-white hover:scale-105 duration-300">Daftar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="flex justify-center items-center py-10">
                {{ $perusahaans->links() }}
            </div>
        </div>
    </div>
@endsection
