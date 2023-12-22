<title>Pendaftaran PKL</title>
@extends('layouts.user.main')
@section('content')
    <div class="px-7 py-16">
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
                    @foreach ($pembimbings as $pembimbing)
                        @if ($pembimbing->perusahaan_id == $perusahaans->id)
                            <tr>
                                <td> {{ $pembimbing->guru->nama }}</td>
                                <td> {{ $pembimbing->permohonan->siswa->nama }}</td>
                                <td> {{ $pembimbing->permohonan->siswa->kelas }}</td>
                                <td> {{ $pembimbing->permohonan->siswa->jurusan->singkatan }}</td>
                                <td> {{ $pembimbing->permohonan->durasi_pkl }}</td>
                                <td class="flex gap-4">
                                    <div>
                                        <div x-data="{ modalOpen: false }" @keydown.escape.window="modalOpen = false"
                                            class="relative z-50 w-auto h-auto">
                                            <button @click="modalOpen=true"
                                                class="px-5 font-semibold text-white duration-300 btn btn-sm bg-success hover:bg-success hover:scale-105">Terima</button>
                                            <template x-teleport="body">
                                                <div x-show="modalOpen"
                                                    class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen h-screen"
                                                    x-cloak>
                                                    <div x-show="modalOpen" x-transition:enter="ease-out duration-300"
                                                        x-transition:enter-start="opacity-0"
                                                        x-transition:enter-end="opacity-100"
                                                        x-transition:leave="ease-in duration-300"
                                                        x-transition:leave-start="opacity-100"
                                                        x-transition:leave-end="opacity-0" @click="modalOpen=false"
                                                        class="absolute inset-0 w-full h-full bg-black bg-opacity-40"></div>
                                                    <div x-show="modalOpen" x-trap.inert.noscroll="modalOpen"
                                                        x-transition:enter="ease-out duration-300"
                                                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                                        x-transition:leave="ease-in duration-200"
                                                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                        class="relative w-full py-6 bg-white px-7 sm:max-w-lg sm:rounded-lg">
                                                        <div class="flex items-center justify-between pb-2">
                                                            <button @click="modalOpen=false"
                                                                class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 mt-5 mr-5 text-gray-600 rounded-full hover:text-gray-800 hover:bg-gray-50">
                                                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M6 18L18 6M6 6l12 12" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                        <div class="relative w-auto">
                                                            <form class="grid justify-center mt-6 mb-12 gap-y-2"
                                                                action="{{ route('perusahaan.terima-siswa', $pembimbing->id) }}"
                                                                method="post">
                                                                @csrf
                                                                <input type="hidden" name="pembimbing_id"
                                                                    value="{{ $pembimbing->id }}">
                                                                <label for="keterangan"
                                                                    class="text-start">Keterangan</label>
                                                                <div class="flex flex-col gap-y-3">
                                                                    <textarea name="keterangan" id="keterangan" cols="30" rows="6" class="rounded-md"
                                                                        placeholder="Silahkan memberi keterangan pada siswa ini."></textarea>
                                                                    <button type="submit"
                                                                        class="btn btn-sm btn-success">Kirim</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </template>
                                        </div>
                                    </div>
                                    <div>
                                        <div x-data="{ modalOpen: false }" @keydown.escape.window="modalOpen = false"
                                            class="relative z-50 w-auto h-auto">
                                            <button @click="modalOpen=true"
                                                class="px-5 font-semibold text-white duration-300 btn btn-sm bg-error hover:bg-error hover:scale-105">Tolak</button>
                                            <template x-teleport="body">
                                                <div x-show="modalOpen"
                                                    class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen h-screen"
                                                    x-cloak>
                                                    <div x-show="modalOpen" x-transition:enter="ease-out duration-300"
                                                        x-transition:enter-start="opacity-0"
                                                        x-transition:enter-end="opacity-100"
                                                        x-transition:leave="ease-in duration-300"
                                                        x-transition:leave-start="opacity-100"
                                                        x-transition:leave-end="opacity-0" @click="modalOpen=false"
                                                        class="absolute inset-0 w-full h-full bg-black bg-opacity-40"></div>
                                                    <div x-show="modalOpen" x-trap.inert.noscroll="modalOpen"
                                                        x-transition:enter="ease-out duration-300"
                                                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                                        x-transition:leave="ease-in duration-200"
                                                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                        class="relative w-full py-6 bg-white px-7 sm:max-w-lg sm:rounded-lg">
                                                        <div class="flex items-center justify-between pb-2">
                                                            <button @click="modalOpen=false"
                                                                class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 mt-5 mr-5 text-gray-600 rounded-full hover:text-gray-800 hover:bg-gray-50">
                                                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M6 18L18 6M6 6l12 12" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                        <div class="relative w-auto">
                                                            <form class="grid justify-center mt-6 mb-12 gap-y-2"
                                                                action="{{ route('perusahaan.tolak-siswa', $pembimbing->id) }}"
                                                                method="post">
                                                                @csrf
                                                                <input type="hidden" name="pembimbing_id"
                                                                    value="{{ $pembimbing->id }}">
                                                                <label for="keterangan"
                                                                    class="text-start">Keterangan</label>
                                                                <div class="flex flex-col gap-y-3">
                                                                    <textarea name="keterangan" id="keterangan" cols="30" rows="6" class="rounded-md"
                                                                        placeholder="Silahkan memberi keterangan pada siswa ini."></textarea>
                                                                    <button type="submit"
                                                                        class="btn btn-sm btn-success">Kirim</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </template>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
