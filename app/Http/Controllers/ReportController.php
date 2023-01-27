<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
use PDF;
class ReportController extends Controller
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
            $data['jurnal'] = Jurnal::whereBetween('tgl_jurnal',[request()->date1,request()->date2])->get();

            // return view('report.cetak', $data);
            $pdf = PDF::loadView('report.cetak', $data);
            return $pdf->download();
        }
        return view('report.index');
    }

}
