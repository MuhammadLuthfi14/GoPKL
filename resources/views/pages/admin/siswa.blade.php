<title>Siswa</title>
@extends('layouts.admin.main')

@php
    $counter = 0;
@endphp

@section('content')
    <div>
        <div class="grid justify-end form-control p-7">
            <label class="label">
                <span class="text-black label-text">Cari Siswa :</span>
            </label>
            <form action="{{ route('siswa') }}" method="GET">
                <input type="text" placeholder="Masukkan data yang ingin anda cari"
                    class="input input-bordered w-40 text-sm md:w-60 lg:w-80" name="search" value="{{ old('cari') }}" />
            </form>
        </div>
        <div class="overflow-x-auto p-7">
            <table class="table table-zebra">
                <!-- head -->
                <thead>
                    <tr class="text-sm text-black border-b border-black">
                        <th></th>
                        <th>Email</th>
                        <th>Nama</th>
                        <th>Nama Perusahaan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permohonans as $permohonan)
                        @php
                            $counter = $counter + 1;
                        @endphp
                        @if ($permohonan->siswa->user->hasRole('siswa'))
                            <tr>
                                <th>{{ $counter }}</th>
                                <td>{{ $permohonan->siswa->user->email }}</td>
                                <td>{{ $permohonan->siswa->nama }}</td>
                                @if ($permohonan->perusahaan->user->hasRole('perusahaan'))
                                    <td>{{ $permohonan->perusahaan->nama }}</td>
                                @endif
                                <td class="flex gap-1">
                                    {{-- Button Info --}}
                                    <div class="relative lg:z-50 ">
                                        <div x-data="{ fullscreenModal: false }" x-init="$watch('fullscreenModal', function(value) {
                                                    if (value === true) {
                                                        document.body.classList.add('overflow-hidden');
                                                    } else {
                                                        document.body.classList.remove('overflow-hidden');
                                                    }
                                                    @keydown.escape ="fullscreenModal=false">
                                            <button @click="fullscreenModal=true"
                                                class="btn btn-sm font-bold btn-primary hover:bg-[#3C79F5] hover:bg-opacity-20 hover:scale-105 duration-300 text-white hover:text-primary">Info</button>
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
                                                            class="bg-white w-screen h-[90%] absolute left-0 right-0 bottom-0">
                                                            <form action="{{ route('siswa') }}" method="GET"
                                                                class="grid items-center w-full h-full grid-cols-2 gap-x-[90px] gap-y-6 py-5 top-30">
                                                                @csrf
                                                                <p
                                                                    class="col-span-2 justify-self-center text-4xl font-bold">
                                                                    Data Siswa PKL</p>

                                                                <div class="flex flex-col justify-self-end">
                                                                    <label for="email">Email Siswa</label>
                                                                    <input type="text" id="email" name="email"
                                                                        value="{{ $permohonan->siswa->user->email }}"
                                                                        readonly
                                                                        class="p-2 border w-[469px] border-[#787A91] rounded-md focus:outline-none">

                                                                </div>

                                                                <div class="flex flex-col justify-self-start">
                                                                    <label for="nama">Nama Siswa</label>
                                                                    <input type="text" id="nama" name="nama"
                                                                        value="{{ $permohonan->siswa->nama }}" readonly
                                                                        class="p-2 border w-[469px] border-[#787A91] rounded-md focus:outline-none">

                                                                </div>

                                                                <div class="flex flex-col justify-self-end">
                                                                    <label for="jurusan">Jurusan</label>
                                                                    <input type="text" id="jurusan" name="jurusan"
                                                                        value="{{ $permohonan->siswa->jurusan->nama }}"
                                                                        readonly
                                                                        class="p-2 border w-[469px]  border-[#787A91] rounded-md focus:outline-none">
                                                                </div>

                                                                <div class="flex flex-col justify-self-start">
                                                                    <label for="kelas">Kelas</label>
                                                                    <input type="text" id="kelas" name="kelas"
                                                                        value="{{ $permohonan->siswa->kelas }}" readonly
                                                                        class="p-2 border w-[469px]  border-[#787A91] rounded-md focus:outline-none">
                                                                </div>

                                                                <div class="flex flex-col justify-self-end">
                                                                    <label for="tgl_mulai">Tanggal Mulai</label>
                                                                    <input type="date" id="tgl_mulai" name="tgl_mulai"
                                                                        value="{{ $permohonan->tgl_mulai }}" readonly
                                                                        class="p-2 border w-[469px] border-[#787A91] rounded-md focus:outline-none">
                                                                </div>

                                                                <div class="flex flex-col justify-self-start">
                                                                    <label for="tgl_selesai">Tanggal Selesai</label>
                                                                    <input type="date" id="tgl_selesai"
                                                                        name="tgl_selesai"
                                                                        value="{{ $permohonan->tgl_selesai }}" readonly
                                                                        class="p-2 border w-[469px] border-[#787A91] rounded-md focus:outline-none">
                                                                </div>

                                                                <div class="flex flex-col justify-self-end">
                                                                    <label for="durasi_pkl">Tanggal Selesai</label>
                                                                    <input type="text" id="durasi_pkl" name="durasi_pkl"
                                                                        value="{{ $permohonan->durasi_pkl }}" readonly
                                                                        class="p-2 border w-[469px] border-[#787A91] rounded-md focus:outline-none">
                                                                </div>

                                                                <button type="submit"
                                                                    class="w-[1030px] btn btn-primary hover:bg-[#3C79F5] hover:bg-opacity-20 col-span-2 py-2 justify-self-center rounded-md text-white hover:text-primary hover:scale-105 duration-300">Cetak</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </template>
                                        </div>
                                    </div>

                                    {{-- Button Edit --}}
                                    <div class="relative lg:z-50 ">
                                        <div x-data="{ fullscreenModal: false }" x-init="$watch('fullscreenModal', function(value) {
                                                    if (value === true) {
                                                        document.body.classList.add('overflow-hidden');
                                                    } else {
                                                        document.body.classList.remove('overflow-hidden');
                                                    }
                                                    @keydown.escape ="fullscreenModal=false">
                                            <button @click="fullscreenModal=true"
                                                class="btn btn-sm font-bold btn-warning hover:bg-[#FFBF00] hover:bg-opacity-20 hover:scale-105 duration-300 text-white hover:text-warning">Edit</button>
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
                                                            class="bg-white w-screen h-[90%] absolute left-0 right-0 bottom-0">
                                                            <form action="{{ route('updatesiswa', $permohonan->id) }}"
                                                                method="POST"
                                                                class="grid items-center w-full h-full grid-cols-2 gap-x-[90px] gap-y-6 py-5 top-30">
                                                                @method('PATCH')
                                                                @csrf
                                                                <p
                                                                    class="col-span-2 justify-self-center text-4xl font-bold">
                                                                    Data Siswa PKL</p>

                                                                <div class="flex flex-col justify-self-end">
                                                                    <label for="email">Email Siswa</label>
                                                                    <input type="text" id="email" name="email"
                                                                        value="{{ $permohonan->siswa->user->email }}"
                                                                        class="p-2 border w-[469px] border-[#787A91] rounded-md focus:outline-none">

                                                                </div>

                                                                <div class="flex flex-col justify-self-start">
                                                                    <label for="nama">Nama Siswa</label>
                                                                    <input type="text" id="nama" name="nama"
                                                                        value="{{ $permohonan->siswa->nama }}"
                                                                        class="p-2 border w-[469px] border-[#787A91] rounded-md focus:outline-none">

                                                                </div>

                                                                <div class="flex flex-col justify-self-end">
                                                                    <label for="jurusan_id">Jurusan</label>
                                                                    <select name="jurusan_id"
                                                                        id="jurusan_id_{{ $permohonan->id }}"
                                                                        class="w-[469px] bg-white border-[#00000080] rounded-md select select-bordered focus:outline-none"
                                                                        required>
                                                                        <option
                                                                            value="{{ $permohonan->siswa->jurusan->id }}">
                                                                            {{ $permohonan->siswa->jurusan->nama }}
                                                                        </option>
                                                                        @foreach ($jurusans as $jurusan)
                                                                            <option value="{{ $jurusan->id }}">
                                                                                {{ $jurusan->nama }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <script>
                                                                        $(document).ready(function() {
                                                                            $('#jurusan_id_{{ $permohonan->id }}').select2();
                                                                        });
                                                                    </script>
                                                                </div>

                                                                <div class="flex flex-col justify-self-start">
                                                                    <label for="kelas">Kelas</label>
                                                                    <input type="text" id="kelas" name="kelas"
                                                                        value="{{ $permohonan->siswa->kelas }}"
                                                                        class="p-2 border w-[469px]  border-[#787A91] rounded-md focus:outline-none">
                                                                </div>

                                                                <div class="flex flex-col justify-self-end">
                                                                    <label for="tgl_mulai">Tanggal Mulai</label>
                                                                    <input type="date" id="tgl_mulai" name="tgl_mulai"
                                                                        value="{{ $permohonan->tgl_mulai }}"
                                                                        class="p-2 border w-[469px] border-[#787A91] rounded-md focus:outline-none">
                                                                </div>

                                                                <div class="flex flex-col justify-self-start">
                                                                    <label for="tgl_selesai">Tanggal Selesai</label>
                                                                    <input type="date" id="tgl_selesai"
                                                                        name="tgl_selesai"
                                                                        value="{{ $permohonan->tgl_selesai }}"
                                                                        class="p-2 border w-[469px] border-[#787A91] rounded-md focus:outline-none">
                                                                </div>

                                                                <div class="flex flex-col justify-self-end">
                                                                    <label for="durasi_pkl">Durasi PKL</label>
                                                                    <select name="durasi_pkl" id="durasi_pkl"
                                                                        class="w-[469px] bg-white border-[#00000080] rounded-md select select-bordered focus:outline-none"
                                                                        required>
                                                                        <option>
                                                                            {{ $permohonan->durasi_pkl }}
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
                                                                    class="w-[1030px] btn btn-warning hover:bg-[#FFBF00] hover:bg-opacity-20 col-span-2 py-2 justify-self-center rounded-md text-white hover:text-warning hover:scale-105 duration-300">Edit</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </template>
                                        </div>
                                    </div>

                                    {{-- Button Delete --}}
                                    <form action="{{ route('hapussiswa') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="btn btn-sm font-bold btn-error hover:bg-[#DC3545] hover:bg-opacity-20 hover:scale-105 duration-300 text-white hover:text-error"
                                            type="submit" value="{{ $permohonan->siswa->user->id }}" name="id_user"
                                            onclick="return confirm('Yakin?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @else
                            @php
                                $counter = $counter - 1;
                            @endphp
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
