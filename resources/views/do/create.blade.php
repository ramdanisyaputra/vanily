@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="top-campaign">
            <h3 class="title-3 m-b-30">
                add DO (Choose Payment)
            </h3>
            <hr style="border: 1px solid black; margin-bottom : 30px">
            <div class="table-responsive">
                <table class="table" id="datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Payment</th>
                            <th>Tanggal</th>
                            <th>Project Name</th>
                            <th>Client</th>
                            <th>Desc</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($payment as $key => $row)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$row->no_payment}}</td>
                            <td>{{$row->tgl_payment}}</td>
                            <td>{{$row->inv->po->qt->rfq->projectname}}</td>
                            <td>{{$row->inv->po->qt->rfq->client->companyname}}</td>
                            <td>{{$row->desc}}</td>
                            <td>
                                <a href="{{route('do.input', $row->id)}}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-arrow-right"></i>
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