@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="top-campaign">
            <h3 class="title-3 m-b-30">
                add jurnal
            </h3>
            <hr style="border: 1px solid black; margin-bottom : 30px">
            @if( Session::get('error') !="")
                <div class='alert alert-danger'><center><b>{{Session::get('error')}}</b></center></div>        
            @endif
            <form action="{{route('jurnal.store')}}" method="post">
            @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>No Jurnal</label>
                            <input type="text" name="no_jurnal" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tanggal Jurnal</label>
                            <input type="date" name="tgl_jurnal" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Delivery Order</label>
                    <select name="do_id" id="do_id" class="form-control" required>
                        <option value="" disabled selected>Choose Do</option>
                        @foreach($do as $row)
                            <option value="{{$row->id}}">{{$row->no_do}}</option>
                        @endforeach
                    </select>
                </div>
                <hr style="border: 1px solid black; margin-bottom : 30px">

                <h5 class="title-3 m-b-30">
                    Debit & Kredit <small>*pastikan akun debit dan kredit harus berbeda</small>
                </h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Debit</label>
                            <input type="text" name="debit" id="debit" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Akun</label>
                            <select name="debit_akun_id" id="debit_akun_id" class="form-control" required>
                                <option value="" disabled selected>Pilih Akun</option>
                                @foreach($akun as $row)
                                    <option value="{{$row->id}}">{{$row->keterangan}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Kredit</label>
                            <input type="text" name="kredit" id="kredit" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Akun</label>
                            <select name="kredit_akun_id" id="kredit_akun_id" class="form-control" required>
                                <option value="" disabled selected>Pilih Akun</option>
                                @foreach($akun as $row)
                                    <option value="{{$row->id}}">{{$row->keterangan}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
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
$("#do_id").change(function(){
    var doId = $("#do_id").val();
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type: "POST",
        url : "{{ url('/jurnal/ajax') }}",
        data: { _token:CSRF_TOKEN, doId:doId },
        success: function(msg){
            document.getElementById('kredit').value = msg;
            document.getElementById('debit').value = msg;
        }
    });
});
</script>
@endpush