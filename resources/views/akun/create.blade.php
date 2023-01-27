@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="top-campaign">
            <h3 class="title-3 m-b-30">
                add akun
            </h3>
            <hr style="border: 1px solid black; margin-bottom : 30px">
            
            <form action="{{route('akun.store')}}" method="post">
            @csrf
                <div class="form-group">
                    <label>Kode Akun</label>
                    <input type="text" name="kode_akun" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary text-light">Submit</button>
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