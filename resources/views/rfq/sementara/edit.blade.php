@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="top-campaign">
            <h3 class="title-3 m-b-30">
                edit barang rfq
            </h3>
            <hr style="border: 1px solid black; margin-bottom : 30px">
            @if( Session::get('error') !="")
                <div class='alert alert-danger'><center><b>{{Session::get('error')}}</b></center></div>        
            @endif
            <form action="{{route('sementara.update')}}" method="post">
            @csrf
            @method('PUT')
                <div class="form-group">
                    <label>Type</label>
                    <input type="hidden" name="id" value="{{$sementara->id}}">
                    <input type="text" disabled class="form-control" value="{{$sementara->barang->type}}">
                </div>
                <div class="form-group">
                    <label>Qty</label>
                    <input type="number" name="qty" class="form-control" value="{{$sementara->qty}}" required>
                </div>
                <button type="submit" class="btn btn-warning text-light">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
