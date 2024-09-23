<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <style>
        table.static
        {
            position: relative;
            border: 1px solid #543535;
        }
    </style>
    <title>Cetak Laporan Nilai</title>
</head>
<body>
    <div class="form-group">
        <p align="center"><b>Laporan Nilai Siswa</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width:95%">
            <tr style="background: palegreen">
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama Siswa</th>
                <th>Tema Praktek</th>
                <th>Nilai Kreatif</th>
                <th>Nilai Ketrampilan</th>
                <th>Nilai Sikap</th>
                
            </tr>
            @foreach ($resultPerTanggal as $item)
            <tr>
                <td align="center">{{$loop->iteration}}</td>
                <td align="center">{{$item->created_at->format('Y-m-d')}}</td>
                <td align="center">{{$item->sisnilai->nama}}</td>
                <td align="center">{{$item->tema_praktek}}</td>
                <td align="center">{{$item->nilai_kreatif}}</td>
                <td align="center">{{$item->nilai_ketrampilan}}</td>
                <td align="center">{{$item->nilai_sikap}}</td>
                
            </tr>
            @endforeach
        </table>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>