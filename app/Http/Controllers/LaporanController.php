<?php

namespace App\Http\Controllers;

use App\Models\DoDetail;
use App\Models\DoModel;
use App\Models\Inv;
use App\Models\InvDetail;
use App\Models\Po;
use App\Models\PoDetail;
use Illuminate\Http\Request;
use PDF;
class LaporanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(request()->date1 != null){
            $do = DoModel::whereBetween('tgl_do',[request()->date1,request()->date2])->pluck('id')->toArray();

            $data['do_detail'] = DoDetail::whereIn('do_id', $do)->get();

            $pdf = PDF::loadView('laporan.cetak', $data);
            return $pdf->download();
        }
        return view('laporan.index');
    }

}
