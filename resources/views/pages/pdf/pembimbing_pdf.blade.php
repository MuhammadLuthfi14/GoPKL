@php
    $counter = 0;
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Pembimbing</title>
    <style>
        * {
            font-family: 'Nunito Sans', sans-serif;
            font-size: 10px;
        }

        #pdf {
            border-collapse: collapse;
            width: 100%;
        }

        #pdf td,
        #pdf th {
            border: 1px solid #ddd;
            text-align: center;

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

    <h2 style="text-align: center; padding-bottom: 20px; font-size: 16px;">Laporan Data Pembimbing Siswa PKL</h2>

    <table id="pdf">
        <tr>
            <th>No</th>
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
            @if ($perusahaans->id)
                <tr>
                    <td>{{ $counter }}</td>
                    <td>
                        @php $uniqueSiswa = $groupedPenerimaans->pluck('pembimbing.permohonan.siswa.nama')->unique() @endphp
                        @foreach ($uniqueSiswa as $index => $namaSiswa)
                            @if ($index != 1)
                                <p
                                    style="padding-bottom: 20px; border: 2px solid transparent; border-bottom-color:#ddd; ">
                                    {{ $namaSiswa }}
                                </p>
                            @else
                                <p style="margin-top: 0px; ">
                                    {{ $namaSiswa }}
                                </p>
                            @endif
                        @endforeach
                    </td>
                    <td>
                        @php $uniqueEmailSiswa = $groupedPenerimaans->pluck('pembimbing.permohonan.siswa.user.email')->unique() @endphp
                        @foreach ($uniqueEmailSiswa as $index => $emailSiswa)
                            @if ($index != 1)
                                <p
                                    style="padding-bottom: 20px; border: 2px solid transparent; border-bottom-color:#ddd; ">
                                    {{ $emailSiswa }}
                                </p>
                            @else
                                <p style="margin-top: 0px; ">
                                    {{ $emailSiswa }}
                                </p>
                            @endif
                        @endforeach
                    </td>
                    <td>
                        @php $uniqueKelas = $groupedPenerimaans->pluck('pembimbing.permohonan.siswa.kelas')->unique() @endphp
                        {{ $uniqueKelas->implode(', ') }}
                    </td>
                    <td>
                        @php $uniqueJurusan = $groupedPenerimaans->pluck('pembimbing.permohonan.siswa.jurusan.singkatan')->unique() @endphp
                        @foreach ($uniqueJurusan as $index => $Jurusan)
                            @if ($index != 1)
                                <p
                                    style="padding-bottom: 20px; border: 2px solid transparent; border-bottom-color:#ddd; ">
                                    {{ $Jurusan }}
                                </p>
                            @else
                                <p style="margin-top: 0px; ">
                                    {{ $Jurusan }}
                                </p>
                            @endif
                        @endforeach
                    </td>
                    <td>
                        @php $uniqueTglMulai = $groupedPenerimaans->pluck('pembimbing.permohonan.tgl_mulai')->unique() @endphp
                        @foreach ($uniqueTglMulai as $index => $TglMulai)
                            @if ($index != 1)
                                <p
                                    style="padding-bottom: 20px; border: 2px solid transparent; border-bottom-color:#ddd; ">
                                    {{ $TglMulai }}
                                </p>
                            @else
                                <p style="margin-top: 0px; ">
                                    {{ $TglMulai }}
                                </p>
                            @endif
                        @endforeach
                    </td>
                    <td>
                        @php $uniqueTglSelesai = $groupedPenerimaans->pluck('pembimbing.permohonan.tgl_selesai')->unique() @endphp
                        @foreach ($uniqueTglSelesai as $index => $TglSelesai)
                            @if ($index != 1)
                                <p
                                    style="padding-bottom: 20px; border: 2px solid transparent; border-bottom-color:#ddd; ">
                                    {{ $TglSelesai }}
                                </p>
                            @else
                                <p style="margin-top: 0px; ">
                                    {{ $TglSelesai }}
                                </p>
                            @endif
                        @endforeach
                    </td>
                    <td>
                        @php $uniqueDurasiPkl = $groupedPenerimaans->pluck('pembimbing.permohonan.durasi_pkl')->unique() @endphp
                        @foreach ($uniqueDurasiPkl as $index => $DurasiPkl)
                            @if ($index != 1)
                                <p
                                    style="padding-bottom: 20px; border: 2px solid transparent; border-bottom-color:#ddd; ">
                                    {{ $DurasiPkl }}
                                </p>
                            @else
                                <p style="margin-top: 0px; ">
                                    {{ $DurasiPkl }}
                                </p>
                            @endif
                        @endforeach
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
