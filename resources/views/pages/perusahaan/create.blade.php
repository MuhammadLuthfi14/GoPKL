<title>Data Perusahaan</title>
@extends('layouts.template')
@section('content')
    <section class="grid w-full h-screen bg-gray-100 justify-center items-start py-5 md:items-center overflow-auto">
        <div
            class="bg-white rounded-2xl shadow-2xl w-[90vw] lg:w-[80vw] xl:w-[65vw] 2xl:w-[60vw] h-[500px] md:h-[460px] xl:h-[500px] 2xl:h-[600px] grid grid-cols-1 md:grid-cols-2 md:overflow-hidden">
            <div
                class="flex flex-col items-center justify-center w-full h-full rounded-2xl md:rounded-none gap-6 px-10 py-4 bg-white">
                <div class="text-center">
                    <h1 class="text-2xl font-semibold text-black capitalize">Hello {{ Auth::user()->name }}</h1>
                    <p class="text-black/80 text-[15px]">Silahkan masukkan data berikut</p>
                </div>

                <form action="{{ route('perusahaan.store') }}" method="POST">
                    <div>
                        @csrf
                        <div class="grid items-start w-full grid-cols-1 gap-y-3">
                            <div class="grid grid-cols-1">
                                <label class="text-base text-black/80 " for="nama">Nama Perusahaan</label>
                                <input type="text" name="nama" id="nama" required autofocus autocomplete="nama"
                                    placeholder="PT. ARG Solusi Teknologi"
                                    class="w-full py-2 rounded-md focus:outline-none">
                            </div>

                            <div class="grid grid-cols-1">
                                <x-input-label class="pt-2" for="jurusan" :value="__('Jurusan yang dibutuhkan')" />
                                <div class="grid grid-cols-3 gap-4">
                                    <div class="grid items-center grid-cols-2 md:grid-cols-3 xl:gap-x-32 gap-x-28">
                                        <label class="flex gap-2">
                                            <input type="checkbox" name="jurusan[]" id="PPLG" value="PPLG">PPLG
                                        </label>
                                        <label class="flex gap-2">
                                            <input type="checkbox" name="jurusan[]" id="TJKT" value="TJKT">TJKT
                                        </label>
                                        <label class="flex gap-2">
                                            <input type="checkbox" name="jurusan[]" id="ULPW" value="ULPW">ULPW
                                        </label>
                                        <label class="flex gap-2">
                                            <input type="checkbox" name="jurusan[]" id="Pemasaran"
                                                value="Pemasaran">Pemasaran
                                        </label>
                                        <label class="flex gap-2">
                                            <input type="checkbox" name="jurusan[]" id="AKL" value="AKL">AKL
                                        </label>
                                        <label class="flex gap-2">
                                            <input type="checkbox" name="jurusan[]" id="MPLB" value="MPLB">MPLB
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1">
                                <label class="text-base text-black/80 " for="alamat">Alamat Perusahaan</label>
                                <textarea name="alamat" id="alamat" required placeholder="Jl. Kel, Kec, Kota, Provinsi"
                                    class="w-full py-2 bg-white rounded-md textarea textarea-bordered focus:outline-none"></textarea>
                            </div>

                            <div class="flex flex-col items-center py-5 justify-cente md:hidden">
                                <div class="w-full h-52 border-x border-t rounded-t-[15px] border-[#00000080]">
                                    <img class="w-full h-full img-preview rounded-t-[15px]">
                                </div>
                                <input type="file" id="image" name="image" onchange="previewImage()" required
                                    class="file-input file-input-xs md:file-input-sm file-input-bordered text-xs md:text-sm rounded-b-[15px] rounded-t-none w-full bg-white" />
                            </div>

                            <div class="grid grid-cols-1">
                                <button type="submit"
                                    class="bg-[#0F044C] w-full rounded-md text-white py-2 hover:scale-105 transition-all duration-300">Selesai</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="items-center justify-center hidden px-12 py-5 md:flex md:flex-col">
                <div class="w-full h-52 border-x border-t rounded-t-[15px] border-[#00000080]">
                    <img class="w-full h-full img-preview2 rounded-t-[15px]"> <!-- Menambahkan elemen img-preview2 -->
                </div>
                <input type="file" id="image2" name="image" onchange="previewImage2()" required
                    class="file-input file-input-sm file-input-bordered text-sm rounded-b-[15px] rounded-t-none w-full bg-white" />
            </div>

        </div>
    </section>
    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }

        function previewImage2() {
            const image2 = document.querySelector('#image2');
            const imgPreview2 = document.querySelector('.img-preview2');

            imgPreview2.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image2.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview2.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
