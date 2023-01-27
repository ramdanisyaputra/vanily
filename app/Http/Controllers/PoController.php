<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Client;
use App\Models\Po;
use App\Models\PoDetail;
use App\Models\Qt;
use App\Models\QtDetail;
use App\Models\Sementara;
use Illuminate\Http\Request;

class PoController extends Controller
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
        $data['po'] = Po::all();
        return view('po.index', $data);
    }

    public function create()
    {
        $po = Po::all();
        $data['qt'] = Qt::whereNotIn('id', $po->pluck('qt_id')->toArray())->get();
        return view('po.create', $data);
    }

    public function createInput($id)
    {
        $data['qt'] = Qt::find($id);
        $data['qt_detail'] = QtDetail::where('qt_id', $id)->get();
        return view('po.input', $data);
    }
    
    public function store(Request $request)
    {
        $cek_po = Po::where('no_po', $request->no_po)->count();
        if($cek_po > 0) {
            return redirect()->back()->with('error','No po tersebut sudah digunakan, mohon untuk menggunakan no po yang lain');
        }
        $po = Po::create([
            'no_po' => $request->no_po,
            'qt_id' => $request->qt_id,
            'tgl_po' => $request->tgl_po,
            'desc' => $request->desc,
            'pajak' => $request->pajak,
            'total' => $request->grandtotal,
        ]);

        foreach($request->barang_id as $key => $id)
        {
            $poDetail = new PoDetail();
            $poDetail->po_id = $po->id;
            $poDetail->qt_id = $request->qt_id;
            $poDetail->barang_id = $request->barang_id[$key];
            $poDetail->qty = $request->qty[$key];
            $poDetail->harga = $request->harga[$key];
            $poDetail->save();
        }

        return redirect()->route('po.index')->with('success','Data Berhasil Ditambahkan');
    }

    public function view($id)
    {
        $data['po'] = Po::find($id);
        $data['qt'] = Qt::where('id', $data['po']->qt_id)->first();
        $data['po_detail'] = PoDetail::where('po_id', $id)->get();
        return view('po.view', $data);
    }
}
