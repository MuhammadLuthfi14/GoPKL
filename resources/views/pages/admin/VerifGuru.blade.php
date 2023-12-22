<title>Verifikasi Guru</title>
@extends('layouts.admin.main')

@php
    $counter = 0;
@endphp

@section('content')
    <div>
        <div class="grid justify-end form-control p-7">
            <label class="label">
                <span class="text-black label-text">Cari Guru :</span>
            </label>
            <form action="{{ route('VerifGuru') }}" method="GET">
                <input type="text" placeholder="Masukkan data yang ingin anda cari"
                    class="input input-bordered w-32 text-sm md:w-52 lg:w-72" name="search" value="{{ old('cari') }}"
                    </form>
        </div>
        <div class="overflow-x-auto p-7">
            <table class="table table-zebra">
                <!-- head -->
                <thead>
                    <tr class="text-sm text-black border-b-2 border-black">
                        <th></th>
                        <th>Email</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Verifikasi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($gurus as $guru)
                        @php
                            $counter = $counter + 1;
                        @endphp

                        {{-- jika guru --}}
                        @if ($guru->user->hasRole('guru'))
                            @php
                                $counter = $counter - 1;
                            @endphp

                            {{-- jika tidak guru --}}
                        @else
                            <tr>
                                <td>{{ $counter }}</td>
                                <td>{{ $guru->user->email }}</td>
                                <td>{{ $guru->nama }}</td>
                                <td>{{ $guru->jabatan->nama }}</td>
                                <td class="flex gap-4">
                                    <form action="{{ route('terimaguru') }}" method="post">
                                        @csrf
                                        <input type="hidden" value="{{ $guru->user->id }}" name="id_user">
