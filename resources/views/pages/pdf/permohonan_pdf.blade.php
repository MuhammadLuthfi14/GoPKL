<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Permohonan</title>
    <style>
        * {
            font-family: 'Nunito Sans', sans-serif;
        }

        #obat {
            border-collapse: collapse;
            width: 100%;
        }

        #obat td,
        #obat th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #obat tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #obat tr:hover {
            background-color: #ddd;
        }

        #obat th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #00afee;
            color: white;
        }
    </style>
</head>

<body>

    <h2 style="text-align: center; padding-bottom: 20px;">Laporan Data Penerimaan PKL</h2>

    <table id="obat">
        <tr>
            <th>No</th>
            <th>Nama Kategori</th>
        </tr>
        @foreach ($permohonans as $permohonan)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $permohonan->nama }}</td>
            </tr>
        @endforeach
</body>

</html>
