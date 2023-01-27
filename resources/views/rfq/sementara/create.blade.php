@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="top-campaign">
            <h3 class="title-3 m-b-30">
                add barang rfq
            </h3>
            <hr style="border: 1px solid black; margin-bottom : 30px">
            @if( Session::get('error') !="")
                <div class='alert alert-danger'><center><b>{{Session::get('error')}}</b></center></div>        
            @endif
            <form action="{{route('sementara.store')}}" method="post">
            @csrf
                <div class="form-group">
                    <label>Type</label>
                    <select name="barang_id" id="barang_id" class="form-control" required>
                        <option value="" disabled selected>Choose Barang</option>
                        @foreach($barang as $row)
                            <option value="{{$row->id}}">{{$row->type}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Qty</label>
                    <input type="number" name="qty" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary text-light">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
