<title>Verifikasi Siswa</title>
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
            <form action="{{ route('VerifSiswa') }}" method="GET">
                <input type="text" placeholder="Masukkan data yang ingin anda cari"
                    class="input input-bordered w-32 text-sm md:w-52 lg:w-72" name="search" value="{{ old('cari') }}" />
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
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Verifikasi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswas as $siswa)
                        @php
                            $counter = $counter + 1;
                        @endphp

                        {{-- jika siswa --}}
                        @if ($siswa->user->hasRole('siswa'))
                            @php
                                $counter = $counter - 1;
                            @endphp

                            {{-- jika tidak siswa --}}
                        @else
                            <tr>
                                <td>{{ $counter }}</td>
                                <td>{{ $siswa->user->email }}</td>
                                <td>{{ $siswa->nama }}</td>
                                <td>{{ $siswa->kelas }}</td>
                                <td>{{ $siswa->jurusan->singkatan }}</td>
                                <td class="flex gap-4">
                                    <form action="{{ route('terimasiswa') }}" method="post">
                                        @csrf
                                        <input type="hidden" value="{{ $siswa->user->id }}" name="id_user">
                                        <button name="terima" value="terima" class="btn btn-success btn-sm">terima</button>
                                    </form>
                                    <form action="{{ route('hapussiswa') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-error btn-sm type="submit" value="{{ $siswa->user->id }}"
                                            name="id_user" onclick="return confirm('Yakin?')">Tolak</button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
