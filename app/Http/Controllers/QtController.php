<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Client;
use App\Models\Qt;
use App\Models\QtDetail;
use App\Models\Rfq;
use App\Models\RfqDetail;
use App\Models\Sementara;
use Illuminate\Http\Request;
use PDF;

class QtController extends Controller
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
        $data['qt'] = Qt::all();
        return view('qt.index', $data);
    }

    public function create()
    {
        $qt = Qt::all();
        $data['rfq'] = Rfq::whereNotIn('id', $qt->pluck('rfq_id')->toArray())->get();
        return view('qt.create', $data);
    }

    public function createInput($id)
    {
        $data['rfq'] = Rfq::find($id);
        $data['rfq_detail'] = RfqDetail::where('rfq_id', $id)->get();
        return view('qt.input', $data);
    }
    
    public function store(Request $request)
    {
        $cek_qt = Qt::where('no_qt', $request->no_qt)->count();
        if($cek_qt > 0) {
            return redirect()->back()->with('error','No Qt tersebut sudah digunakan, mohon untuk menggunakan no qt yang lain');
        }
        $qt = Qt::create([
            'no_qt' => $request->no_qt,
            'rfq_id' => $request->rfq_id,
            'tgl_qt' => $request->tgl_qt,
            'desc' => $request->desc,
            'pajak' => $request->pajak,
            'total' => $request->grandtotal,
        ]);

        foreach($request->barang_id as $key => $id)
        {
            $qtDetail = new QtDetail();
            $qtDetail->qt_id = $qt->id;
            $qtDetail->rfq_id = $request->rfq_id;
            $qtDetail->barang_id = $request->barang_id[$key];
            $qtDetail->qty = $request->qty[$key];
            $qtDetail->harga = $request->harga[$key];
            $qtDetail->save();
        }

        return redirect()->route('qt.index')->with('success','Data Berhasil Ditambahkan');
    }

    public function view($id)
    {
        $data['qt'] = Qt::find($id);
        $data['rfq'] = Rfq::where('id', $data['qt']->rfq_id)->first();
        $data['qt_detail'] = QtDetail::where('qt_id', $id)->get();
        return view('qt.view', $data);
    }

    public function cetak($id)
    {
        $data['qt'] = Qt::find($id);
        $data['rfq'] = Rfq::where('id', $data['qt']->rfq_id)->first();
        $data['qt_detail'] = QtDetail::where('qt_id', $id)->get();
        $pdf = PDF::loadView('qt.cetak', $data);
        return $pdf->download();
    }
}
