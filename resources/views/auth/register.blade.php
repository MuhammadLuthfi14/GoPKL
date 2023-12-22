<title>Daftar</title>
@extends('layouts.template')
@section('content')
    <section class="grid w-full h-screen bg-gray-100 place-items-center">
        <div
            class="bg-white rounded-2xl shadow-2xl w-[90vw] lg:w-[80vw] xl:w-[65vw] 2xl:w-[60vw] h-[500px] md:h-[460px] xl:h-[500px] 2xl:h-[600px] grid grid-cols-1 md:grid-cols-2 overflow-hidden">
            <div class="grid w-full h-full grid-cols-1 px-10 py-4 bg-white">
                <div class="text-center">
                    <h1 class="text-2xl font-semibold text-black capitalize">Selamat Datang !</h1>
                    <p class="text-black/80 text-[15px]">Hello | Silahkan masukan data anda</p>
                </div>
                <form action="{{ route('register') }}" method="POST">
                    <div>
                        @csrf
                        <div class="grid items-start w-full grid-cols-1 gap-y-3">
                            <div class="grid grid-cols-1">
                                <label class="text-base text-black/80 " for="name">Username</label>
                                <input type="text" name="name" id="name" required autofocus autocomplete="name"
                                    placeholder="go_pkl" class="w-full rounded-md focus:outline-none">
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <div class="grid grid-cols-1">
                                <label class="text-base text-black/80" for="email">Email</label>
                                <input type="email" name="email" id="email" required autocomplete="username"
                                    placeholder="contoh@gmail.com" class="w-full rounded-md focus:outline-none">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <div class="grid grid-cols-1">
                                <label class="text-base text-black/80" for="password">Password</label>
                                <input type="password" name="password" id="password" required autocomplete="new-password"
                                    placeholder="********" class="w-full rounded-md focus:outline-none">
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <div class="grid grid-cols-1">
                                <label class="text-base text-black/80" for="password_confirmation">Konfirmasi
                                    Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" required
                                    autocomplete="new-password" placeholder="********"
                                    class="w-full rounded-md focus:outline-none">
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>

                            <div class="grid grid-cols-1">
                                <button type="submit"
                                    class="bg-[#0F044C] w-full rounded-md text-white py-2 hover:scale-105 transition-all duration-300">Daftar</button>
                            </div>

                            <div class="flex items-center justify-between text-xs">
                                <p class="text-[##00000080]">kamu sudah punya akun ?</p>
                                @if (Route::has('register'))
                                    <a class="py-2 px-5 bg-white border text-[#000000] rounded-md shadow-md hover:scale-110 duration-300"
                                        href="{{ route('login') }}">Masuk
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
@endsection
