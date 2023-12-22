<title>Hasil Pendaftaran</title>
@extends('layouts.user.main')
@section('content')
    <div class="py-14 px-7">
        <div class="flex flex-col md:flex-row justify-start items-start md:items-center md:justify-end gap-x-4">
            <form action="{{ route('pembimbing') }}" method="GET">
                <label class="label">
                    <span class="text-black label-text">Cari Perusahaan :</span>
                </label>
                <input type="text" placeholder="Masukkan data yang ingin anda cari"
                    class="text-[12px] md:text-sm input input-bordered w-[265px] md:w-80" name="search" value="{{ old('cari') }}" />
            </form>
            <div class="flex items-center justify-center md:pt-4">
                <a href="{{ route('pembimbing-pdf') }}" class="font-bold text-white btn btn-info"><i
                        class="fa-solid fa-print"></i>Cetak</a>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="table table-zebra">
                <thead>
                    <tr class="text-black border-b border-black">
                        <th>Guru Pembimbing</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Durasi PKL</th>
                        <th>Penerimaan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penerimaans as $penerimaan)
                        @if ($penerimaan->perusahaan_id == $perusahaans->id)
                            <tr>
                                <td>{{ $penerimaan->pembimbing->guru->nama }}</td>
                                <td>{{ $penerimaan->pembimbing->permohonan->siswa->nama }}</td>
                                <td>{{ $penerimaan->pembimbing->permohonan->siswa->kelas }}</td>
                                <td>{{ $penerimaan->pembimbing->permohonan->siswa->jurusan->singkatan }}</td>
                                <td>{{ $penerimaan->pembimbing->permohonan->durasi_pkl }}</td>
                                <td class="flex text-white gap-x-2">
                                    <div class="relative z-50 ">
                                        <div x-data="{ fullscreenModal: false }" x-init="$watch('fullscreenModal', function(value) {
                                                    if (value === true) {
                                                        document.body.classList.add('overflow-hidden');
                                                    } else {
                                                        document.body.classList.remove('overflow-hidden');
                                                    }
                                                    @keydown.escape ="fullscreenModal=false">
                                            <button @click="fullscreenModal=true"
                                                class="btn btn-sm font-semibold bg-[#3C79F5] hover:bg-[#3C79F5] hover:scale-105 duration-300 text-white">Info</button>
                                            <template x-teleport="body">
                                                <div x-show="fullscreenModal"
                                                    x-transition:enter="transition ease-out duration-300"
                                                    x-transition:enter-start="translate-y-full"
                                                    x-transition:enter-end="translate-y-0"
                                                    x-transition:leave="transition ease-in duration-300"
                                                    x-transition:leave-start="translate-y-0"
                                                    x-transition:leave-end="translate-y-full"
                                                    class="flex fixed z-[99] w-screen  inset-0 h-screen bg-black/40">
                                                    <button @click="fullscreenModal=false"
                                                        class="absolute z-30 top-4 right-10 ">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="white"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="white"
                                                            class="w-10 h-10">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M6 18L18 6M6 6l12 12" />
                                                        </svg>
                                                    </button>
                                                    <div class="relative flex flex-wrap items-center w-full h-full ">
                                                        <div
                                                            class="bg-white overflow-y-auto w-full h-[90%] absolute left-0 right-0 bottom-0">
                                                            <form action="" method=""
                                                                class="grid items-center w-full h-full grid-cols-2 xl:gap-x-[90px] gap-x-[55px] gap-y-6 py-5 top-30">
                                                                <h1
                                                                    class="col-span-2 text-xl md:text-2xl xl:text-5xl font-bold capitalize justify-self-center">
                                                                    Data Siswa PKL
                                                                </h1>
                                                                <div class="flex flex-col col-span-2 md:col-span-1 justify-self-center md:justify-self-end">
                                                                    <label for="email">Email</label>
                                                                    <input type="email" id="email" name="email"
                                                                        readonly
                                                                        value="{{ $penerimaan->pembimbing->permohonan->siswa->user->email }}"
                                                                        class="p-2 border w-[300px] xl:w-[469px]  border-[#787A91] rounded-md focus:outline-none">
                                                                </div>
                                                                <div class="flex flex-col col-span-2 md:col-span-1 justify-self-center md:justify-self-start">
                                                                    <label for="nama">Nama Siswa</label>
                                                                    <input type="text" id="nama" name="nama"
                                                                        readonly
                                                                        value="{{ $penerimaan->pembimbing->permohonan->siswa->nama }}"
                                                                        class="p-2 border w-[300px] xl:w-[469px] border-[#787A91] rounded-md focus:outline-none">

                                                                </div>
                                                                <div class="flex flex-col col-span-2 md:col-span-1 justify-self-center md:justify-self-end">
                                                                    <label for="jurusan">Jurusan</label>
                                                                    <input type="text" id="jurusan" name="jurusan"
                                                                        readonly
                                                                        value="{{ $penerimaan->pembimbing->permohonan->siswa->jurusan->nama }}"
                                                                        class="p-2 border w-[300px] xl:w-[469px]  border-[#787A91] rounded-md focus:outline-none">
                                                                </div>
                                                                <div class="flex flex-col col-span-2 md:col-span-1 justify-self-center md:justify-self-start">
                                                                    <label for="kelas">Kelas</label>
                                                                    <input type="text" id="kelas" name="kelas"
                                                                        readonly
                                                                        value="{{ $penerimaan->pembimbing->permohonan->siswa->kelas }}"
                                                                        class="p-2 border w-[300px] xl:w-[469px]  border-[#787A91] rounded-md focus:outline-none">
                                                                </div>
                                                                <div class="flex flex-col col-span-2 md:col-span-1 justify-self-center md:justify-self-end">
                                                                    <label for="tgl_mulai">Tanggal Mulai</label>
                                                                    <input type="date" id="tgl_mulai" name="tgl_mulai"
                                                                        readonly
                                                                        value="{{ $penerimaan->pembimbing->permohonan->tgl_mulai }}"
                                                                        class="p-2 border w-[300px] xl:w-[469px] border-[#787A91] rounded-md focus:outline-none">
                                                                </div>
                                                                <div class="flex flex-col col-span-2 md:col-span-1 justify-self-center md:justify-self-start">
                                                                    <label for="tgl_selesai">Tanggal Selesai</label>
                                                                    <input type="date" id="tgl_selesai"
                                                                        name="tgl_selesai" readonly
                                                                        value="{{ $penerimaan->pembimbing->permohonan->tgl_selesai }}"
                                                                        class="p-2 border w-[300px] xl:w-[469px] border-[#787A91] rounded-md focus:outline-none">
                                                                </div>
                                                                <div class="flex flex-col col-span-2 md:col-span-1 justify-self-center md:justify-self-end">
                                                                    <label for="durasi_pkl">Durasi PKL</label>
                                                                    <input type="text" id="durasi_pkl" name="durasi_pkl"
                                                                        readonly
                                                                        value="{{ $penerimaan->pembimbing->permohonan->durasi_pkl }}"
                                                                        class="p-2 border w-[300px] xl:w-[469px] border-[#787A91] rounded-md focus:outline-none">
                                                                </div>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                        </div>
                                        </template>
                                    </div>
        </div>
        <form action="{{ route('perusahaan.hapus-siswa', $penerimaan->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-error btn-sm" type="submit" onclick="return confirm('Yakin?')">Hapus</button>
        </form>
        </td>
        </tr>
        @endif
        @endforeach

        </tbody>
        </table>
    </div>

    </div>
@endsection
