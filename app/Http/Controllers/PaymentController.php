<?php

namespace App\Http\Controllers;

use App\Models\DoDetail;
use App\Models\DoModel;
use App\Models\Inv;
use App\Models\InvDetail;
use App\Models\Payment;
use App\Models\PaymentDetail;
use Illuminate\Http\Request;

class PaymentController extends Controller
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
        $data['payment'] = Payment::all();
        return view('payment.index', $data);
    }

    public function create()
    {
        $payment = Payment::all();
        $data['inv'] = Inv::whereNotIn('id', $payment->pluck('inv_id')->toArray())->get();
        return view('payment.create', $data);
    }

    public function createInput($id)
    {
        $data['inv'] = Inv::find($id);
        $data['inv_detail'] = InvDetail::where('inv_id', $id)->get();
        return view('payment.input', $data);
    }
    
    public function store(Request $request)
    {
        $cek_payment = Payment::where('no_payment', $request->no_payment)->count();
        if($cek_payment > 0) {
            return redirect()->back()->with('error','No Do tersebut sudah digunakan, mohon untuk menggunakan no do yang lain');
        }
        $payment = Payment::create([
            'no_payment' => $request->no_payment,
            'inv_id' => $request->inv_id,
            'tgl_payment' => $request->tgl_payment,
            'desc' => $request->desc,
            'pajak' => $request->pajak,
            'shipping' => $request->shipping,
            'total' => $request->grandtotal,
            'bank' => $request->bank,
            'account_name' => $request->account_name,
        ]);

        foreach($request->barang_id as $key => $id)
        {
            $paymentDetail = new PaymentDetail();
            $paymentDetail->payment_id = $payment->id;
            $paymentDetail->inv_id = $request->inv_id;
            $paymentDetail->barang_id = $request->barang_id[$key];
            $paymentDetail->qty = $request->qty[$key];
            $paymentDetail->harga = $request->harga[$key];
            $paymentDetail->save();
        }

        return redirect()->route('payment.index')->with('success','Data Berhasil Ditambahkan');
    }

    public function view($id)
    {
        $data['payment'] = Payment::find($id);
        $data['inv'] = Inv::where('id', $data['payment']->inv_id)->first();
        $data['payment_detail'] = PaymentDetail::where('payment_id', $id)->get();
        return view('payment.view', $data);
    }
}
