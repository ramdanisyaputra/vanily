@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="top-campaign">
            <h3 class="title-3 m-b-30">
                add rfq
            </h3>
            <hr style="border: 1px solid black; margin-bottom : 30px">
            @if( Session::get('error') !="")
                <div class='alert alert-danger'><center><b>{{Session::get('error')}}</b></center></div>        
            @endif
                <div class="form-group">
                    <label>Tanggal RFQ</label>
                    <input type="text" class="form-control" value="{{ $rfq->tgl_rfq }}" readonly required>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row mt-1">
    <div class="col-lg-12">
        <div class="top-campaign">
            <h3 class="title-3 m-b-30">
                data barang
            </h3>
            @if( Session::get('success') !="")
                <div class='alert alert-success'><center><b>{{Session::get('success')}}</b></center></div>        
            @endif
            
            <div class="table-responsive">
                <table class="table" id="datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Description</th>
                            <th>UOM</th>
                            <th>Type</th>
                            <th>Harga</th>
                            <th>qty</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rfq_detail as $key => $row)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$row->barang->desc}}</td>
                            <td>{{$row->barang->uom}}</td>
                            <td>{{$row->barang->type}}</td>
                            <td>{{$row->barang->hrg}}</td>
                            <td>{{$row->qty}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="top-campaign">
            <form action="{{route('rfq.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label>No RFQ</label>
                    <input type="text" name="no_rfq" value="{{$rfq->no_rfq}}" class="form-control" readonly required>
                </div>
                <div class="form-group">
                    <label>Project Name</label>
                    <input type="text" name="projectname" value="{{$rfq->projectname}}" class="form-control" readonly required>
                </div>
                <div class="form-group">
                    <label>Client</label>
                    <input type="text" class="form-control" value="{{$rfq->client->companyname}}" readonly>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="desc" id="desc" cols="30" rows="10" class="form-control" required readonly>{{$rfq->desc}}</textarea>
                </div>
            </form>
        </div>
    </div>
</div>



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
@endpush