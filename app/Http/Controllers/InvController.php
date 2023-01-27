<?php

namespace App\Http\Controllers;

use App\Models\Inv;
use App\Models\InvDetail;
use App\Models\Po;
use App\Models\PoDetail;
use Illuminate\Http\Request;
use PDF;
class InvController extends Controller
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
        $data['inv'] = Inv::all();
        return view('inv.index', $data);
    }

    public function create()
    {
        $inv = Inv::all();
        $data['po'] = Po::whereNotIn('id', $inv->pluck('po_id')->toArray())->get();
        return view('inv.create', $data);
    }

    public function createInput($id)
    {
        $data['po'] = Po::find($id);
        $data['po_detail'] = PoDetail::where('po_id', $id)->get();
        return view('inv.input', $data);
    }
    
    public function store(Request $request)
    {
        $cek_inv = Inv::where('no_inv', $request->no_inv)->count();
        if($cek_inv > 0) {
            return redirect()->back()->with('error','No invoice tersebut sudah digunakan, mohon untuk menggunakan no invoice yang lain');
        }
        $inv = Inv::create([
            'no_inv' => $request->no_inv,
            'po_id' => $request->po_id,
            'tgl_inv' => $request->tgl_inv,
            'desc' => $request->desc,
            'pajak' => $request->pajak,
            'shipping' => $request->shipping,
            'total' => $request->grandtotal,
        ]);

        foreach($request->barang_id as $key => $id)
        {
            $invDetail = new InvDetail();
            $invDetail->inv_id = $inv->id;
            $invDetail->po_id = $request->po_id;
            $invDetail->barang_id = $request->barang_id[$key];
            $invDetail->qty = $request->qty[$key];
            $invDetail->harga = $request->harga[$key];
            $invDetail->save();
        }

        return redirect()->route('inv.index')->with('success','Data Berhasil Ditambahkan');
    }

    public function view($id)
    {
        $data['inv'] = Inv::find($id);
        $data['po'] = Po::where('id', $data['inv']->po_id)->first();
        $data['inv_detail'] = InvDetail::where('inv_id', $id)->get();
        return view('inv.view', $data);
    }

    public function cetak($id)
    {
        $data['inv'] = Inv::find($id);
        $data['po'] = Po::where('id', $data['inv']->po_id)->first();
        $data['inv_detail'] = InvDetail::where('inv_id', $id)->get();
        $pdf = PDF::loadView('inv.cetak', $data);
        return $pdf->download();
    }
}
