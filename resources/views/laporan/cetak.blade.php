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
        <td><h2>Laporan Penjualan</h2></td>
    </tr>
</table>

<table class="table table-bordered" width="100%" align="center">
    <thead>
        <tr>
            <th>No</th>
            <th>No Invoice</th>
            <th>Tanggal</th>
            <th>Project Name</th>
            <th>Client</th>
            <th>Barang</th>    
            <th>Jumlah</th>
            <th>Sub Total</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $total = 0
        ?>
        @foreach($do_detail as $key => $row)
        <tr>
            <td>{{++$key}}</td>
            <td>{{$row->do->no_do}}</td>
            <td>{{$row->do->tgl_do}}</td>
            <td>{{$row->do->payment->inv->po->qt->rfq->projectname}}</td>
            <td>{{$row->do->payment->inv->po->qt->rfq->client->companyname}}</td>
            <td>{{$row->barang->desc}}</td>    
            <td>{{$row->qty}}</td>
            <td>{{number_format($row->qty * $row->harga)}}</td>
            <?php
                $total = $total + ($row->qty * $row->harga);
            ?>
        </tr>
        @endforeach
        <tr>
            <td colspan="6"></td>
            <td>Total</td>
            <td>{{number_format($total)}}</td>
        </tr>
    </tbody>
</table>
</body>
</html>