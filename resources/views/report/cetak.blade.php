<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
        table tr td,
        table tr th{
        font-size: 10pt;
        }
    </style>
</head>
<body>
<table class="table table-bordered" width="100%" align="center">
    <tr align="center">
        <td><h2>Laporan Jurnal</h2></td>
    </tr>
</table>

<table class="table table-bordered" width="100%" align="center">
    <thead>
        <tr>
            <th>No</th>
            <th>No Jurnal</th>
            <th>Tanggal</th>
            <th>No Do</th>
            <th>Keterangan</th>
            <th>Debet</th>    
            <th>Kredit</th>
        </tr>
    </thead>
    <tbody>
        @foreach($jurnal as $key => $row)
        <tr>
            <td>{{++$key}}</td>
            <td>{{$row->no_jurnal}}</td>
            <td>{{$row->tgl_jurnal}}</td>
            <td>{{$row->do->no_do}}</td>
            <td>{{\App\Models\Akun::find($row->debit_akun_id)->keterangan}}</td>
            <td>{{$row->debit}}</td>
            <td></td>
        </tr>
        <tr>
            <td colspan="4"></td>
            <td>{{\App\Models\Akun::find($row->kredit_akun_id)->keterangan}}</td>
            <td></td>
            <td>{{$row->kredit}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>