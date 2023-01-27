<html>

<head>
    <meta charset="utf-8">
    <title>QT PT Vanilys Indo Patriot</title>
    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            brfq: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: normal;
            /* inherit */
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: center;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            brfq-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            brfq-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            brfq-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            brfq-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <img src="img/logo.png" width="150px"> 
        <strong><p align="right" >QUOTATION</strong></p><br>
        <strong>PT. Vanilys Indo Patriot</strong> <br>
        No : {{ $qt->no_qt }}<br> 
        Date : {{ $qt->tgl_qt }}<br>
        Project Name : {{ $qt->rfq->projectname }}<br><br>
        <strong>Kepada</strong><br>
        <!--<table>-->
        <!--    <td>-->
        {{$qt->rfq->client->companyname}} <br>
        {{$qt->rfq->client->alamat}} <br>
<br>
        <table border="1" style="font-size:14px;border-collapse: collapse;">
            <thead>
                <tr>
                    <th>Id Barang</th>
                    <th>Deskripsi/Nama Barang</th>
                    <th>Type</th>
                    <th>Unit</th>
                    <th>QTY</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @php($total = 0)
                @php($tbrg = 0)
                <?php 
                    $total = 0;
                ?>
                @foreach($qt_detail as $temp)
                <tr>
                    <td>{{$temp->barang->id}}</td>
                    <td>{{$temp->barang->desc}}</td>
                    <td>{{$temp->barang->type}}</td>
                    <td>{{$temp->barang->uom}}</td>
                    <td>{{$temp->qty}}</td>
                    <td>{{number_format($temp->harga)}}</td>
                    <td>{{number_format($temp->qty * $temp->harga)}}</td>
                    <?php 
                        $total = $total + ($temp->harga * $temp->qty);
                    ?>
                </tr>
                @endforeach
                <tr>
                    <td colspan="5"></td>
                    <td>Total</td>
                    <td>{{number_format($total)}}</td>
                </tr>
                <tr>
                    <td colspan="5"></td>
                    <td>Pajak(%)</td>
                    <td>{{$qt->pajak}}</td>
                </tr>
                <tr>
                    <td colspan="5"></td>
                    <td>Total Pajak</td>
                    <td>{{($qt->pajak * $total) / 100}}</td>
                </tr>
                <tr>
                    <td colspan="5"></td>
                    <td>Grand Total</td>
                    <td>{{number_format($qt->total)}}</td>
                </tr>
            </tbody>
        </table>
<br>
        <table border="1" style="font-size:14px;border-collapse: collapse;">
            <tr>
                <td align="center">SPECIAL NOTES</td>
            </tr>
            <tr>
                <td>
                    {{nl2br($qt->desc)}}
                </td>
            </tr>
        </table>
    <!--</table>-->
    </div>
</body>
</html>