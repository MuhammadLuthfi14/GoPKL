@php
    $counter = 0;
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Penerimaan</title>
    <style>
        * {
            font-family: 'Nunito Sans', sans-serif;
            font-size: 9px;
        }

        #pdf {
            border-collapse: collapse;
            width: 100%;
        }

        #pdf td,
        #pdf th {
            border: 1px solid #ddd;
            text-align: center;
            padding: 3px;
        }

        #pdf tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #pdf tr:hover {
            background-color: #ddd;
        }

        #pdf th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #00afee;
            color: white;
        }
    </style>
</head>

<body>

    <h2 style="text-align: center; padding-bottom: 20px; font-size: 16px;">Laporan Data Penerimaan Siswa PKL</h2>

    <table id="pdf">
        <tr>
            <th>No</th>
            <th>Nama Perusahaan</th>
            <th>Email Perusahaan</th>
            <th>Alamat Perusahaan</th>
            <th>Nama Siswa</th>
            <th>Email Siswa</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Durasi PKL</th>
            <th>Guru Pembimbing</th>
            <th>Email Guru</th>
        </tr>

        @foreach ($penerimaans as $penerimaan => $groupedPenerimaans)
            @php
                $counter = $counter + 1;
            @endphp
            @if ($penerimaan)
                <tr>
                    <td>{{ $counter }}</td>
                    <td>{{ $groupedPenerimaans[0]->perusahaan->nama }}</td>
                    <td>{{ $groupedPenerimaans[0]->perusahaan->user->email }}</td>
                    <td>{{ $groupedPenerimaans[0]->perusahaan->alamat }}</td>
                    <td>
                        @php $uniqueSiswa = $groupedPenerimaans->pluck('pembimbing.permohonan.siswa.nama')->unique() @endphp
                        @foreach ($uniqueSiswa as $namaSiswa)
                            {{ $namaSiswa }} <br>
                        @endforeach
                    </td>
                    <td>
                        @php $uniqueEmailSiswa = $groupedPenerimaans->pluck('pembimbing.permohonan.siswa.user.email')->unique() @endphp
                        {{ $uniqueEmailSiswa->implode(', ') }}
                    </td>
                    <td>
                        @php $uniqueKelas = $groupedPenerimaans->pluck('pembimbing.permohonan.siswa.kelas')->unique() @endphp
                        {{ $uniqueKelas->implode(', ') }}
                    </td>
                    <td>
                        @php $uniqueJurusan = $groupedPenerimaans->pluck('pembimbing.permohonan.siswa.jurusan.singkatan')->unique() @endphp
                        {{ $uniqueJurusan->implode(', ') }}
                    </td>
                    <td>
                        @php $uniqueTglMulai = $groupedPenerimaans->pluck('pembimbing.permohonan.tgl_mulai')->unique() @endphp
                        {{ $uniqueTglMulai->implode(', ') }}
                    </td>
                    <td>
                        @php $uniqueTglSelesai = $groupedPenerimaans->pluck('pembimbing.permohonan.tgl_selesai')->unique() @endphp
                        {{ $uniqueTglSelesai->implode(', ') }}
                    </td>
                    <td>
                        @php $uniqueDurasiPkl = $groupedPenerimaans->pluck('pembimbing.permohonan.durasi_pkl')->unique() @endphp
                        {{ $uniqueDurasiPkl->implode(', ') }}
                    </td>
                    <td>
                        @php $uniqueGuru = $groupedPenerimaans->pluck('pembimbing.guru.nama')->unique() @endphp
                        {{ $uniqueGuru->implode(', ') }}
                    </td>
                    <td>
                        @php $uniqueEmailGuru = $groupedPenerimaans->pluck('pembimbing.guru.user.email')->unique() @endphp
                        {{ $uniqueEmailGuru->implode(', ') }}
                    </td>
                </tr>
            @else
                @php
                    $counter = $counter - 1;
                @endphp
            @endif
        @endforeach

</body>

</html>
