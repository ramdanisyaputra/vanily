<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\DoDetail;
use App\Models\DoModel;
use App\Models\Jurnal;
use App\Models\JurnalDetail;
use App\Models\Payment;
use App\Models\PaymentDetail;
use Illuminate\Http\Request;
use PDF;

class JurnalController extends Controller
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
        $data['jurnal'] = Jurnal::all();
        return view('jurnal.index', $data);
    }

    public function create()
    {
        $jurnal = Jurnal::all();
        $data['do'] = DoModel::whereNotIn('id', $jurnal->pluck('do_id')->toArray())->get();
        $data['akun'] = Akun::all();
        return view('jurnal.create', $data);
    }

    public function ajax(Request $request)
    {
        $do = DoModel::find($request->doId)->total;
        return $do;
    }

    public function store(Request $request)
    {
        $cek_jurnal = Jurnal::where('no_jurnal', $request->no_jurnal)->count();
        if($cek_jurnal > 0) {
            return redirect()->back()->with('error','No Do tersebut sudah digunakan, mohon untuk menggunakan no do yang lain');
        }

        if($request->kredit_akun_id == $request->debit_akun_id){
            return redirect()->back()->with('error','Pastikan akun debit dan kredit berbeda');
        }
        Jurnal::create([
            'no_jurnal' => $request->no_jurnal,
            'do_id' => $request->do_id,
            'tgl_jurnal' => $request->tgl_jurnal,
            'kredit' => $request->kredit,
            'debit' => $request->debit,
            'kredit_akun_id' => $request->kredit_akun_id,
            'debit_akun_id' => $request->debit_akun_id,
            'user_id' => auth()->user()->id,

        ]);

        return redirect()->route('jurnal.index')->with('success','Data Berhasil Ditambahkan');
    }

    public function view($id)
    {
        $data['jurnal'] = Jurnal::find($id);
        return view('jurnal.view', $data);
    }

    public function cetak($id)
    {
        $data['jurnal'] = Jurnal::find($id);
        $pdf = PDF::loadView('jurnal.cetak', $data);
        return $pdf->download();
    }
}
