@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="top-campaign">
            <h3 class="title-3 m-b-30">
                data admin
                &nbsp;
                <a href="{{route('admin.create')}}" title="Tambah" class="btn btn-primary btn-sm rounded-circle">
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
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($admin as $key => $row)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->username}}</td>
                            <td>{{$row->email}}</td>
                            <td>
                                <a href="{{route('admin.edit', $row->id)}}" class="btn btn-warning btn-sm text-light">
                                    <i class="fas fa-pencil-square-o"></i>
                                </a>

                                <a href="{{route('admin.delete', $row->id)}}" onclick="return confirm('Apakah Anda Yakin ?')" class="btn btn-danger btn-sm">
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