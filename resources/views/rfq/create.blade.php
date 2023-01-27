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
                    <input type="text" class="form-control" value="{{ date('Y-m-d') }}" readonly required>
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
                &nbsp;
                <a href="{{route('sementara.create')}}" title="Tambah" class="btn btn-primary btn-sm rounded-circle">
                    <i class="fas fa-plus ml-2"></i>
                </a>
            </h3>
            @if( Session::get('success') !="")
                <div class='alert alert-success'><center><b>{{Session::get('success')}}</b></center></div>        
            @endif
            @if( Session::get('error2') !="")
                <div class='alert alert-danger'><center><b>{{Session::get('error2')}}</b></center></div>        
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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sementara as $key => $row)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$row->barang->desc}}</td>
                            <td>{{$row->barang->uom}}</td>
                            <td>{{$row->barang->type}}</td>
                            <td>{{$row->barang->hrg}}</td>
                            <td>{{$row->qty}}</td>
                            <td>
                                <a href="{{route('sementara.edit', $row->id)}}" class="btn btn-warning btn-sm text-light">
                                    <i class="fas fa-pencil-square-o"></i>
                                </a>

                                <a href="{{route('sementara.delete', $row->id)}}" onclick="return confirm('Apakah Anda Yakin ?')" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
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
                    <input type="hidden" name="tgl_rfq" value="{{ date('Y-m-d') }}">
                    <input type="text" name="no_rfq" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Project Name</label>
                    <input type="text" name="projectname" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Client</label>
                    <select name="client_id" id="client_id" class="form-control" required>
                        <option value="" disabled selected>Choose Client</option>
                        @foreach($client as $row)
                        <option value="{{$row->id}}">{{$row->companyname}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="desc" id="desc" cols="30" rows="10" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
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