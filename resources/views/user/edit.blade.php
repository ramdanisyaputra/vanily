@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="top-campaign">
            <h3 class="title-3 m-b-30">
                edit user
            </h3>
            <hr style="border: 1px solid black; margin-bottom : 30px">
            
            <form action="{{route('user.update')}}" method="post">
            @csrf
            @method('PUT')

                <div class="form-group">
                    <label>Name</label>
                    <input type="hidden" name="id" value="{{$user->id}}">
                    <input type="text" name="name" class="form-control" value="{{$user->name}}" required>
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