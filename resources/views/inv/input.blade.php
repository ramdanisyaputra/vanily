@extends('layouts.main')
@section('content')
<form action="{{route('inv.store')}}" method="post">
@csrf
<div class="row">
    <div class="col-lg-12">
        <div class="top-campaign">
            <h3 class="title-3 m-b-30">
                add invoice
            </h3>
            <hr style="border: 1px solid black; margin-bottom : 30px">
            @if( Session::get('error') !="")
                <div class='alert alert-danger'><center><b>{{Session::get('error')}}</b></center></div>        
            @endif
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>No inv</label>
                        <input type="text" name="no_inv" class="form-control" placeholder="Fill No Invoice" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>No PO</label>
                        <input type="text" class="form-control" value="{{ $po->no_po }}" readonly required>
                        <input type="hidden" name="po_id" class="form-control" value="{{ $po->id }}" readonly required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" name="tgl_inv" class="form-control" value="{{ date('Y-m-d') }}" readonly required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Project Name</label>
                        <input type="text" class="form-control" value="{{ $po->qt->rfq->projectname }}" readonly required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Client</label>
                        <input type="text" class="form-control" value="{{ $po->qt->rfq->client->companyname }}" readonly required>
                    </div>
                </div>
            </div>
            <hr style="border: 1px solid black; margin-bottom : 30px">
            <h3 class="title-3 m-b-30">
                barang
            </h3>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Description</th>
                            <th>UOM</th>
                            <th>Type</th>
                            <th>qty</th>
                            <th>Harga</th>
                            <th>Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $total = 0;
                        ?>
                        @foreach($po_detail as $key => $row)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>
                                {{$row->barang->desc}}
                                <input type="hidden" name="barang_id[]" value="{{$row->barang_id}}">
                                <input type="hidden" name="qty[]" value="{{$row->qty}}">
                            </td>
                            <td>{{$row->barang->uom}}</td>
                            <td>{{$row->barang->type}}</td>
                            <td>{{$row->qty}}</td>
                            <td><input name="harga[]" id="harga" class="form-control" type="text" onkeyup="hrg()" value="{{$row->harga}}" required></td>
                            <td><input name="subtotal[]" id="subtotal" class="form-control" type="text" value="{{$row->harga * $row->qty}}"></td>
                            <?php 
                                $total = $total + ($row->harga * $row->qty);
                            ?>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="5"></td>
                            <td>Total</td>
                            <td><input type="text" name="total" id="total" class="form-control" value="{{$total}}" readonly></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="5"></td>
                            <td>Pajak (%)</td>
                            <td><input type="number" id="pajak" name="pajak" class="form-control" value="{{$po->pajak}}" onkeyup="total2()"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="5"></td>
                            <td>Total Pajak</td>
                            <td><input type="text"  name="totalpajak" class="form-control" id="tpajak" value="{{($po->pajak * $total)/ 100}}" required readonly></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="5"></td>
                            <td>Shipping</td>
                            <td><input type="text"  id="shipp" name="shipping" class="form-control" onkeyup="total3()" ></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="5"></td>
                            <td>Grand Total</td>
                            <td><input type="text"  name="grandtotal" class="form-control" id="grand" value="{{$po->total}}" required readonly></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <hr style="border: 1px solid black; margin-bottom : 30px">
            <div class="form-group">
                <label>Description</label>
                <textarea name="desc" id="desc" cols="20" rows="5" class="form-control">{{$po->desc}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</div>
</form>





@endsection
@push('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#datatable').DataTable();
    });
</script>
<script type="text/javascript">
    function hrg() {
        var qty = document.getElementsByName("qty[]");
        var harga = document.getElementsByName("harga[]");
        var subtotal = document.getElementsByName("subtotal[]");
        var pajak = document.getElementById('pajak').value = null;
        var tpajak = document.getElementById('tpajak').value = null;
        var grand = document.getElementById('grand').value = null;
        var tbrg = 0;
        for(var i = 0; i < harga.length; i++) {
            subtotal[i].value = parseInt(qty[i].value*harga[i].value);
            
            tbrg += parseInt(subtotal[i].value)
        }
        document.getElementById('total').value = tbrg;
    }
    
    function total2() {
        var valgoritma = (parseInt(document.getElementById('pajak').value) * parseInt(document.getElementById('total').value)) / 100;

        document.getElementById('tpajak').value = valgoritma;
    }
    
    function total3() {
        var grandtot = parseInt(document.getElementById('tpajak').value) + parseInt(document.getElementById('total').value) + parseInt(document.getElementById('shipp').value);

        document.getElementById('grand').value = grandtot;
    }

</script>
@endpush