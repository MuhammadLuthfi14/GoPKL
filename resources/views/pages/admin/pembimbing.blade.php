<title>Pembimbing</title>
@extends('layouts.admin.main')
@section('content')
    <div class="py-4">
        <div class="flex justify-end p-7 gap-x-4">
            <form action="{{ route('pembimbing') }}" method="GET">
                <label class="label">
                    <span class="text-black label-text">Cari Perusahaan :</span>
                </label>
                <input type="text" placeholder="Masukkan data yang ingin anda cari"
                    class="input input-bordered w-32 text-sm md:w-52 lg:w-72" name="search" value="{{ old('cari') }}" />
            </form>
            <div class="flex items-center justify-center pt-4">
                <a href="{{ route('penerimaan-pdf') }}" class="font-bold text-white btn btn-info"><i
                        class="fa-solid fa-print"></i>Cetak</a>
            </div>
        </div>
        <div class="overflow-x-auto px-7">
            <table class="table table-zebra">
                <!-- head -->
                <thead>
                    <tr class="text-sm text-black border-b-2 border-black">
                        <th></th>
                        <th>Nama Perusahaan</th>
                        <th>Alamat</th>
                        <th>Daftar Guru Pembimbing</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($perusahaans as $perusahaan)
                        <tr>
                            <td></td>
                            <td>{{ $perusahaan->nama }}</td>
                            <td>{{ $perusahaan->alamat }}</td>
                            <td class="flex gap-4">
                                <div class="relative lg:z-50">
                                    <div x-data="{ fullscreenModal: false }" x-init="$watch('fullscreenModal', function(value) {
                                                if (value === true) {
                                                    document.body.classList.add('overflow-hidden');
                                                } else {
                                                    document.body.classList.remove('overflow-hidden');
                                                }
                                                @keydown.escape ="fullscreenModal=false">
                                        @php
                                            $SudahDaftar = false;
                                            foreach ($gurus as $guru) {
                                                $countPembimbing = \App\Models\Pembimbing::where('guru_id', $guru->id)
                                                    ->where('perusahaan_id', $perusahaan->id)
                                                    ->count();

                                                if ($countPembimbing >= 1) {
                                                    $SudahDaftar = true;
                                                    break;
                                                }
                                            }
                                        @endphp

                                        @if ($SudahDaftar)
                                            <button
                                                class="font-bold text-white duration-300 btn btn-sm btn-success hover:bg-success hover:scale-105"
                                                disabled readonly>Sudah terdaftar</button>
                                        @else
                                            <button @click="fullscreenModal=true"
                                                class="font-bold text-white duration-300 btn btn-sm btn-success hover:bg-success hover:scale-105">Daftar</button>
                                        @endif

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
                                                <div class="relative flex flex-wrap items-center w-full h-full">
                                                    <div
                                                        class="bg-white w-screen h-[90%] absolute left-0 right-0 bottom-0 overflow-y-auto">
                                                        <form action="{{ route('daftarpembimbing') }}" method="POST"
                                                            class="grid items-center w-full h-full grid-cols-2 gap-x-[90px] gap-y-6 py-5 top-30">
                                                            @csrf
                                                            <div
                                                                class="flex flex-col col-span-2 text-center gap-y-4 justify-self-center">
                                                                <h1 class="text-4xl font-bold">
                                                                    Pendaftaran Guru Pembimbing</h1>
                                                                <h2 class="text-3xl font-medium">
                                                                    {{ $perusahaan->nama }}</h2>
                                                            </div>
                                                            <input type="hidden" name="perusahaan_id"
                                                                value="{{ $perusahaan->id }}">
                                                            <div class="col-span-2 justify-self-center w-[1030px]">
                                                                <table class="table table-zebra">
                                                                    <thead>
                                                                        <tr class="text-black border-b border-black">
                                                                            <th></th>
                                                                            <th>Nama</th>
                                                                            <th>Kelas</th>
                                                                            <th>Jurusan</th>
                                                                            <th>Tanggal Mulai</th>
                                                                            <th>Tanggal Selesai</th>
                                                                            <th>Durasi PKL</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($permohonans as $permohonan)
                                                                            @if ($perusahaan->id == $permohonan->perusahaan->id)
                                                                                <tr>
                                                                                    <th></th>
                                                                                    <td>{{ $permohonan->siswa->nama }}</td>
                                                                                    <td>{{ $permohonan->siswa->kelas }}</td>
                                                                                    <td>{{ $permohonan->siswa->jurusan->singkatan }}
                                                                                    </td>
                                                                                    <td>{{ $permohonan->tgl_mulai }}</td>
                                                                                    <td>{{ $permohonan->tgl_selesai }}</td>
                                                                                    <td>{{ $permohonan->durasi_pkl }}</td>
                                                                                </tr>
                                                                            @endif
                                                                            <input type="hidden"
                                                                                value="{{ $permohonan->id }}"
                                                                                name="permohonan_id">
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>

                                                            <div class="col-span-2 py-2 justify-self-center">
                                                                <label for="guru" class="flex flex-col">Cari
                                                                    Pembimbing</label>
                                                                <select name="guru" id="guru_{{ $perusahaan->id }}"
                                                                    class="w-[1030px] bg-white border-[#00000080] rounded-md select select-bordered focus:outline-none"
                                                                    required>
                                                                    <option>Silahkan pilih pembimbing</option>
                                                                    @foreach ($gurus as $guru)
                                                                        <option value="{{ $guru->id }}">
                                                                            {{ $guru->nama }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <script>
                                                                    $(document).ready(function() {
                                                                        $('#guru_{{ $perusahaan->id }}').select2();
                                                                    });
                                                                </script>
                                                            </div>


                                                            <button type="submit"
                                                                class="w-[1030px] btn btn-success col-span-2 py-2 justify-self-center rounded-md text-white hover:scale-105 duration-300">Daftar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
