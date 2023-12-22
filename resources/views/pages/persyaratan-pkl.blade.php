<title>Persyaratan PKL</title>
@extends('layouts.user.main')
@section('content')
    <div class="grid grid-cols-1">
        <div class="bg-gray-200 text-center mx-5  md:mx-40 mt-20 rounded-t-3xl">
            <h1 class="py-5 text-black font-semibold text-lg">Syarat Pendaftaran Praktek Kerja Lapangan (PKL)</h1>
        </div>
        <div class="mx-5 mb-20 border-b md:mx-40 border-x rounded-b-3xl">
            <ul class="flex flex-col px-10 py-3 space-y-3 text-sm list-decimal text-black/70 md:text-base">
                @foreach ($persyaratans as $persyaratan)
                    <li class="text-black">{{ $persyaratan->deskripsi }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
