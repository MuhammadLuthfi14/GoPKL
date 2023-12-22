<title>Perusahaan</title>
@extends('layouts.admin.main')

@php
    $counter = 0;
@endphp

@section('content')
    <div>
        <div class="grid justify-end form-control p-7">
            <label class="label">
                <span class="text-black label-text">Cari Perusahaan :</span>
            </label>
            <form action="{{ route('perusahaan') }}" method="GET">
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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($perusahaans as $index => $perusahaan)
                        @php
                            $counter = $counter + 1;
                        @endphp
                        @if ($perusahaan->user->hasRole('perusahaan'))
                            <tr>
                                <th>{{ $index + $perusahaans->firstItem() }}</th>
                                <td>{{ $perusahaan->user->email }}</td>
                                <td>{{ $perusahaan->nama }}</td>
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
                                                            <form action="{{ route('perusahaan') }}" method="GET"
                                                                class="grid items-center w-full h-full grid-cols-2 gap-x-[90px] gap-y-6 py-5 top-30">
                                                                @csrf
                                                                <p
                                                                    class="col-span-2 justify-self-center text-4xl font-bold">
                                                                    Data Perusahaan</p>

                                                                <div class="flex flex-col justify-self-end">
                                                                    <label for="email">Email</label>
                                                                    <input type="text" id="email" name="email"
                                                                        value="{{ $perusahaan->user->email }}" readonly
                                                                        class="p-2 border w-[469px] border-[#787A91] rounded-md focus:outline-none">

                                                                </div>

                                                                <div class="flex flex-col justify-self-start">
                                                                    <label for="nama">Nama Perusahaan</label>
                                                                    <input type="text" id="nama" name="nama"
                                                                        value="{{ $perusahaan->nama }}" readonly
                                                                        class="p-2 border w-[469px] border-[#787A91] rounded-md focus:outline-none">

                                                                </div>

                                                                <div class="flex flex-col justify-self-end">
                                                                    <label for="jurusan">Jurusan</label>

                                                                    @php
                                                                        $jurusanArray = explode(', ', $perusahaan->jurusan);
                                                                    @endphp

                                                                    <div class="grid grid-cols-3 py-2 gap-x-16 gap-y-4">
                                                                        <label class="flex gap-2">
                                                                            <input type="checkbox" name="jurusan[]"
                                                                                id="PPLG" value="PPLG"
                                                                                {{ in_array('PPLG', $jurusanArray) ? 'checked' : '' }}
                                                                                disabled>PPLG
                                                                        </label>
                                                                        <label class="flex gap-2">
                                                                            <input type="checkbox" name="jurusan[]"
                                                                                id="TJKT" value="TJKT"
                                                                                {{ in_array('TJKT', $jurusanArray) ? 'checked' : '' }}
                                                                                disabled>TJKT
                                                                        </label>
                                                                        <label class="flex gap-2">
                                                                            <input type="checkbox" name="jurusan[]"
                                                                                id="ULPW" value="ULPW"
                                                                                {{ in_array('ULPW', $jurusanArray) ? 'checked' : '' }}
                                                                                disabled>ULPW
                                                                        </label>
                                                                        <label class="flex gap-2">
                                                                            <input type="checkbox" name="jurusan[]"
                                                                                id="Pemasaran" value="Pemasaran"
                                                                                {{ in_array('Pemasaran', $jurusanArray) ? 'checked' : '' }}
                                                                                disabled>Pemasaran
                                                                        </label>
                                                                        <label class="flex gap-2">
                                                                            <input type="checkbox" name="jurusan[]"
                                                                                id="AKL" value="AKL"
                                                                                {{ in_array('AKL', $jurusanArray) ? 'checked' : '' }}
                                                                                disabled>AKL
                                                                        </label>
                                                                        <label class="flex gap-2">
                                                                            <input type="checkbox" name="jurusan[]"
                                                                                id="MPLB" value="MPLB"
                                                                                {{ in_array('MPLB', $jurusanArray) ? 'checked' : '' }}
                                                                                disabled>MPLB
                                                                        </label>
                                                                    </div>
                                                                </div>

                                                                <div class="flex flex-col justify-self-start">
                                                                    <label for="nama">Alamat Perusahaan</label>
                                                                    <textarea cols="30" rows="10" type="text" id="nama" name="nama" readonly
                                                                        class="p-2 border w-[469px] border-[#787A91] rounded-md focus:outline-none">{{ $perusahaan->alamat }}</textarea>
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
                                                            <form
                                                                action="{{ route('updateperusahaan', $perusahaan->id) }}"
                                                                method="POST"
                                                                class="grid items-center w-full h-full grid-cols-2 gap-x-[90px] gap-y-6 py-5 top-30">
                                                                @method('PATCH')
                                                                @csrf
                                                                <p
                                                                    class="col-span-2 justify-self-center text-4xl font-bold">
                                                                    Data Perusahaan</p>

                                                                <div class="flex flex-col justify-self-end">
                                                                    <label for="email">Email</label>
                                                                    <input type="text" id="email" name="email"
                                                                        value="{{ $perusahaan->user->email }}"
                                                                        class="p-2 border w-[469px] border-[#787A91] rounded-md focus:outline-none">

                                                                </div>

                                                                <div class="flex flex-col justify-self-start">
                                                                    <label for="nama">Nama Perusahaan</label>
                                                                    <input type="text" id="nama" name="nama"
                                                                        value="{{ $perusahaan->nama }}"
                                                                        class="p-2 border w-[469px] border-[#787A91] rounded-md focus:outline-none">

                                                                </div>

                                                                <div class="flex flex-col justify-self-end">
                                                                    <label for="jurusan">Jurusan</label>

                                                                    @php
                                                                        $jurusanArray = explode(', ', $perusahaan->jurusan);
                                                                    @endphp

                                                                    <div class="grid grid-cols-3 py-2 gap-x-16 gap-y-4">
                                                                        <label class="flex gap-2">
                                                                            <input type="checkbox" name="jurusan[]"
                                                                                id="PPLG" value="PPLG"
                                                                                {{ in_array('PPLG', $jurusanArray) ? 'checked' : '' }}>PPLG
                                                                        </label>
                                                                        <label class="flex gap-2">
                                                                            <input type="checkbox" name="jurusan[]"
                                                                                id="TJKT" value="TJKT"
                                                                                {{ in_array('TJKT', $jurusanArray) ? 'checked' : '' }}>TJKT
                                                                        </label>
                                                                        <label class="flex gap-2">
                                                                            <input type="checkbox" name="jurusan[]"
                                                                                id="ULPW" value="ULPW"
                                                                                {{ in_array('ULPW', $jurusanArray) ? 'checked' : '' }}>ULPW
                                                                        </label>
                                                                        <label class="flex gap-2">
                                                                            <input type="checkbox" name="jurusan[]"
                                                                                id="Pemasaran" value="Pemasaran"
                                                                                {{ in_array('Pemasaran', $jurusanArray) ? 'checked' : '' }}>Pemasaran
                                                                        </label>
                                                                        <label class="flex gap-2">
                                                                            <input type="checkbox" name="jurusan[]"
                                                                                id="AKL" value="AKL"
                                                                                {{ in_array('AKL', $jurusanArray) ? 'checked' : '' }}>AKL
                                                                        </label>
                                                                        <label class="flex gap-2">
                                                                            <input type="checkbox" name="jurusan[]"
                                                                                id="MPLB" value="MPLB"
                                                                                {{ in_array('MPLB', $jurusanArray) ? 'checked' : '' }}>MPLB
                                                                        </label>
                                                                    </div>
                                                                </div>

                                                                <div class="flex flex-col justify-self-start">
                                                                    <label for="nama">Alamat Perusahaan</label>
                                                                    <textarea cols="30" rows="10" type="text" id="alamat" name="alamat"
                                                                        class="p-2 border w-[469px] border-[#787A91] rounded-md focus:outline-none">{{ $perusahaan->alamat }}</textarea>
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
                                    <form action="{{ route('hapusperusahaan') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="btn btn-sm font-bold btn-error hover:bg-[#DC3545] hover:bg-opacity-20 hover:scale-105 duration-300 text-white hover:text-error"
                                            type="submit" value="{{ $perusahaan->user->id }}" name="id_user"
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
            <div>
                {{ $perusahaans->links() }}
            </div>
        </div>
    </div>
@endsection
