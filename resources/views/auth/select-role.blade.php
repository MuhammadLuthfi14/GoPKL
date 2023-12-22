<title>Select Role</title>
@extends('layouts.template')
@section('content')
    <section class="grid w-full h-screen bg-gray-100 place-items-center">
        <div
            class="bg-white rounded-2xl shadow-2xl max-w-[300px] min-w-[250px] md:max-w-[750px] md:min-w-[50%] lg:max-w-[65vw] 2xl:max-w-[45vw] 2xl:min-w-[40vw] h-[430px] xl:h-[500px] 2xl:h-[600px] grid grid-cols-1 md:grid-cols-2 overflow-hidden">
            <div class="flex flex-col items-center justify-center w-full h-full gap-6 px-10 py-4 bg-white">
                <div class="text-center">
                    <h1 class="text-2xl font-semibold text-black capitalize">Masuk sebagai</h1>
                    <p class="text-black/80 text-[15px]">Silahkan pilih sesuai kebutuhan masing-masing</p>
                </div>

                <div>
                    <div class="grid w-full grid-cols-1">
                        <div class="grid grid-cols-3 text-center text-white gap-x-2 xl:gap-x-4 place-content-center">
                            <a href="{{ route('siswa.create') }}"
                                class="bg-[#0F044C] text-[10px] md:text-xs xl:text-base rounded-md px-2 py-2">Siswa</a>
                            <a href="{{ route('guru.create') }}"
                                class="bg-[#0F044C] text-[10px] md:text-xs xl:text-base rounded-md px-2 py-2">Guru</a>
                            <a href="{{ route('perusahaan.create') }}"
                                class="bg-[#0F044C] text-[10px] md:text-xs xl:text-base rounded-md px-2 py-2">Perusahaan</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hidden w-full h-full bg-white md:block">
                <img src="{{ asset('assets/images/background.jpg') }}" alt="gambar" class="w-full h-full ">
            </div>
        </div>
    </section>
@endsection
