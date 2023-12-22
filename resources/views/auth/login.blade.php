<title>Masuk</title>
@extends('layouts.template')
@section('content')
    <section class="grid w-full h-screen bg-gray-100 place-items-center">
        <div
            class="bg-white rounded-2xl shadow-2xl w-[90vw] lg:w-[80vw] xl:w-[65vw] 2xl:w-[60vw] h-[500px] md:h-[460px] xl:h-[500px] 2xl:h-[600px] grid grid-cols-1 md:grid-cols-2 overflow-hidden">
            <div class="grid w-full h-full grid-cols-1 px-10 bg-white py-7">
                <div class="text-center">
                    <h1 class="text-2xl font-semibold text-black capitalize">Selamat Datang !</h1>
                    <p class="text-black/80 text-[15px]">Hello | Silahkan masukan data anda</p>
                </div>
                <form action="{{ route('login') }}" method="POST">
                    <div>
                        @csrf
                        <div class="grid items-start w-full grid-cols-1 gap-y-4">
                            <div class="grid grid-cols-1">
                                <label class="text-base text-black/80" for="email">Email</label>
                                <input type="email" name="email" id="email" required autofocus
                                    placeholder="contoh@gmail.com" class="w-full py-2 rounded-md focus:outline-none">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <div class="grid grid-cols-1">
                                <label class="text-base text-black/80" for="password">Password</label>
                                <input type="password" name="password" id="password" required placeholder="********"
                                    class="w-full py-2 rounded-md focus:outline-none">
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />

                            </div>

                            <div class="grid max-w-full grid-cols-5">
                                <div id="angkaPertama"
                                    class="grid w-full border border-gray-500 rounded-md place-items-center ">
                                </div>
                                <div id="jenisAritmatika" class="grid w-full py-1 place-items-center">
                                </div>
                                <div id="angkaKedua"
                                    class="grid w-full border border-gray-500 rounded-md place-items-center ">
                                </div>
                                <div class="grid w-full py-1 font-semibold place-items-center">
                                    =
                                </div>
                                <div>
                                    <input id="finalHasil" type="number"
                                        class="block w-full py-1 text-center rounded-md focus:outline-none">
                                </div>
                            </div>

                            <div class="w-full">
                                <button type="submit" id="tombolSubmit"
                                    class="bg-[#0F044C] w-full rounded-md text-white py-2 hover:scale-105 transition-all duration-300">Masuk</button>
                            </div>

                            <div class="block">
                                <label for="remember_me" class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox" checked
                                        class="text-indigo-600 border-gray-300 rounded shadow-sm focus:ring-indigo-500"
                                        name="remember">
                                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                </label>
                            </div>

                            <div class="flex items-center justify-between text-xs">
                                <p class="text-black/70">kamu belum memilki akun ?</p>
                                @if (Route::has('register'))
                                    <a class="py-2 px-3 md:px-5 bg-white text-[#000000] border rounded-md shadow-md hover:scale-110 duration-300"
                                        href="{{ route('register') }}">Daftar
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="hidden w-full h-full bg-white md:block">
                <img src="{{ asset('assets/images/background.jpg') }}" alt="gambar" class="w-full h-full ">
            </div>
        </div>
    </section>
    <script>
        // for debugging 
        function jalanKanScript() {

            const angkaPertama = document.getElementById('angkaPertama');
            const jenisAritmatika = document.getElementById('jenisAritmatika');
            const angkaKedua = document.getElementById('angkaKedua');
            const finalHasil = document.getElementById('finalHasil');
            const tombolSubmit = document.getElementById('tombolSubmit');

            // medendapatkan random angka pertama

            function getRandomData(param) {
                return Math.floor(Math.random() * param);
            }

            function cekKondisiAritmatika(param = false) {
                let isfinalHasilFill = finalHasil.value;
                if (isfinalHasilFill && param) {
                    //ada isi
                    tombolSubmit.classList.remove('bg-gray-500', 'cursor-no-drop');
                    tombolSubmit.classList.add(
                        'active:bg-purple-600', 'hover:bg-[#0F044C]', 'focus:outline-none',
                        'focus:shadow-outline-purple'
                    );
                    tombolSubmit.type = 'submit';

                } else {
                    tombolSubmit.classList.add('bg-gray-500', 'cursor-no-drop');
                    tombolSubmit.classList.remove(
                        'active:bg-purple-600', 'hover:bg-[#0F044C]', 'focus:outline-none',
                        'focus:shadow-outline-purple'
                    );
                    tombolSubmit.type = 'button';
                }
            }
            cekKondisiAritmatika();



            let isfinalHasilFill = finalHasil.textContent;
            if (isfinalHasilFill) {
                tombolSubmit.classList
            }


            let countFirst = getRandomData(90);
            // medendapatkan random angka kedua
            let countSecond = getRandomData(10);
            // medendapatkan random operator aritmatika
            // const aritmatikaOperator = ['+', '-', 'X', '/'];
            const aritmatikaOperator = ['+', '-'];
            const RandomAritmatikaOperator = Math.floor(Math.random() * aritmatikaOperator.length);


            // operasi aritmatika dan penyimoanan hasil akhir
            let hasilAkhirTrue;
            hasilAkhirTrue = aritmatikaOperator[RandomAritmatikaOperator] == '+' ? countFirst + countSecond :
                aritmatikaOperator[RandomAritmatikaOperator] == '-' ? countFirst - countSecond : '';
            // aritmatikaOperator[RandomAritmatikaOperator] == '/' ? countFirst / countSecond : '';
            console.info(hasilAkhirTrue);

            // memasukan ke tampilan
            angkaPertama.textContent = countFirst;
            jenisAritmatika.textContent = aritmatikaOperator[RandomAritmatikaOperator];
            angkaKedua.textContent = countSecond;

            // mendapatkan hasil user

            finalHasil.addEventListener('change', (e) => jalan(e));
            finalHasil.addEventListener('keyup', (e) => jalan(e));


            function jalan(e) {
                console.info('jalan')
                if (e.target.value == hasilAkhirTrue) {

                    cekKondisiAritmatika(true)
                } else {
                    cekKondisiAritmatika(false)
                }

            }

        }
        jalanKanScript();
    </script>
@endsection
