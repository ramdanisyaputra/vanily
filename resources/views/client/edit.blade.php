@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="top-campaign">
            <h3 class="title-3 m-b-30">
                edit client
            </h3>
            <hr style="border: 1px solid black; margin-bottom : 30px">
            
            <form action="{{route('client.update')}}" method="post">
            @csrf
            @method('PUT')
                <div class="form-group">
                    <label>Company Name</label>
                    <input type="hidden" name="id" value="{{$client->id}}">
                    <input type="text" name="companyname" class="form-control" value="{{$client->companyname}}" required>
                </div>
                <div class="form-group">
                    <label>Contact Person</label>
                    <input type="text" name="contactperson" class="form-control" value="{{$client->contactperson}}" required>
                </div>
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" value="{{$client->title}}" required>
                </div>
                <div class="form-group">
                    <label>Job</label>
                    <input type="text" name="job" class="form-control" value="{{$client->job}}" required>
                </div>
                <button type="submit" class="btn btn-warning text-light">Submit</button>
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