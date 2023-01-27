@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="top-campaign">
            <h3 class="title-3 m-b-30">
                laporan jurnal
            </h3>
            <hr style="border: 1px solid black; margin-bottom : 30px">
            <form action="" method="get">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Dari Tanggal</label>
                            <input type="date" name="date1" id="date1" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Hingga Tanggal</label>
                            <input type="date" name="date2" id="date2" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label style="width:100%">&nbsp;</label>
                            <button type="submit" class="btn btn-primary">Cetak</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection
