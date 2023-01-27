<?php

namespace App\Http\Controllers;

use App\Models\DoDetail;
use App\Models\DoModel;
use App\Models\Payment;
use App\Models\PaymentDetail;
use Illuminate\Http\Request;
use PDF;
class DoController extends Controller
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
        $data['do'] = DoModel::all();
        return view('do.index', $data);
    }

    public function create()
    {
        $do = DoModel::all();
        $data['payment'] = Payment::whereNotIn('id', $do->pluck('payment_id')->toArray())->get();
        return view('do.create', $data);
    }

    public function createInput($id)
    {
        $data['payment'] = Payment::find($id);
        $data['payment_detail'] = PaymentDetail::where('payment_id', $id)->get();
        return view('do.input', $data);
    }
    
    public function store(Request $request)
    {
        $cek_do = DoModel::where('no_do', $request->no_do)->count();
        if($cek_do > 0) {
            return redirect()->back()->with('error','No Do tersebut sudah digunakan, mohon untuk menggunakan no do yang lain');
        }
        $do = DoModel::create([
            'no_do' => $request->no_do,
            'payment_id' => $request->payment_id,
            'tgl_do' => $request->tgl_do,
            'desc' => $request->desc,
            'pajak' => $request->pajak,
            'shipping' => $request->shipping,
            'ship_to' => $request->ship_to,
            'total' => $request->grandtotal,
        ]);

        foreach($request->barang_id as $key => $id)
        {
            $doDetail = new DoDetail();
            $doDetail->do_id = $do->id;
            $doDetail->payment_id = $request->payment_id;
            $doDetail->barang_id = $request->barang_id[$key];
            $doDetail->qty = $request->qty[$key];
            $doDetail->harga = $request->harga[$key];
            $doDetail->save();
        }

        return redirect()->route('do.index')->with('success','Data Berhasil Ditambahkan');
    }

    public function view($id)
    {
        $data['do'] = DoModel::find($id);
        $data['payment'] = Payment::where('id', $data['do']->payment_id)->first();
        $data['do_detail'] = DoDetail::where('do_id', $id)->get();
        return view('do.view', $data);
    }

    public function cetak($id)
    {
        $data['do'] = DoModel::find($id);
        $data['payment'] = Payment::where('id', $data['do']->payment_id)->first();
        $data['do_detail'] = DoDetail::where('do_id', $id)->get();
        $pdf = PDF::loadView('do.cetak', $data);
        return $pdf->download();
    }
}
