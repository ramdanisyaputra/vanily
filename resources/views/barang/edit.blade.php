@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="top-campaign">
            <h3 class="title-3 m-b-30">
                edit barang
            </h3>
            <hr style="border: 1px solid black; margin-bottom : 30px">
            
            <form action="{{route('barang.update')}}" method="post">
            @csrf
            @method('PUT')
                <div class="form-group">
                    <label>Description</label>
                    <input type="hidden" name="id" value="{{$barang->id}}">
                    <input type="text" name="desc" value="{{$barang->desc}}" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>UOM</label>
                    <input type="text" name="uom" class="form-control" value="{{$barang->uom}}" required>
                </div>
                <div class="form-group">
                    <label>Type</label>
                    <input type="text" name="type" class="form-control" value="{{$barang->type}}" required>
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <input type="number" name="hrg" class="form-control" value="{{$barang->hrg}}" required>
                </div>
                <div class="form-group">
                    <label>Stock</label>
                    <input type="number" name="stock" class="form-control" value="{{$barang->stock}}" required>
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