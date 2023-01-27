@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="top-campaign">
            <h3 class="title-3 m-b-30">
                data jurnal
                &nbsp;
                <a href="{{route('jurnal.create')}}" title="Tambah" class="btn btn-primary btn-sm rounded-circle">
                    <i class="fas fa-plus ml-2"></i>
                </a>
            </h3>
            <hr style="border: 1px solid black; margin-bottom : 30px">

            @if( Session::get('success') !="")
                <div class='alert alert-success'><center><b>{{Session::get('success')}}</b></center></div>        
            @endif
            <div class="table-responsive">
                <table class="table" id="datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Jurnal</th>
                            <th>No Do</th>
                            <th>Tanggal</th>
                            <th>Project Name</th>
                            <th>Client</th>
                            <th>Akun</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jurnal as $key => $row)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$row->no_jurnal}}</td>
                            <td>{{$row->do->no_do}}</td>
                            <td>{{$row->tgl_jurnal}}</td>
                            <td>{{$row->do->payment->inv->po->qt->rfq->projectname}}</td>
                            <td>{{$row->do->payment->inv->po->qt->rfq->client->companyname}}</td>
                            <td>{{$row->user->name}}</td>
                            <td>
                                <a href="{{route('jurnal.view', $row->id)}}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-eye"></i>
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