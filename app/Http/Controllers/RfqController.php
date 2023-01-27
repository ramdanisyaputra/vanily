<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Client;
use App\Models\Rfq;
use App\Models\RfqDetail;
use App\Models\Sementara;
use Illuminate\Http\Request;

class RfqController extends Controller
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
        $data['rfq'] = Rfq::all();
        return view('rfq.index', $data);
    }

    public function create()
    {
        $data['sementara'] = Sementara::all();
        $data['client'] = Client::all();
        return view('rfq.create', $data);
    }
    
    public function createSementara()
    {
        $sementara = Sementara::where('user_id',auth()->user()->id);
        $data['barang'] = Barang::whereNotIn('id', $sementara->pluck('barang_id')->toArray())->get();
        return view('rfq.sementara.create', $data);
    }

    public function storeSementara(Request $request)
    {
        $barang = Barang::find($request->barang_id);

        if($barang->stock < $request->qty){
            return redirect()->back()->with('error','Jumlah Barang tidak boleh lebih dari stock '.$barang->stock);
        }else{
            Sementara::create([
                'barang_id' => $request->barang_id,
                'qty' => $request->qty,
                'user_id' => auth()->user()->id,
            ]);
        }
        return redirect()->route('rfq.create')->with('success','Data Berhasil Ditambahkan');
    }

    public function editSementara($id)
    {
        $data['sementara'] = Sementara::find($id);

        return view('rfq.sementara.edit', $data);
    }

    public function updateSementara(Request $request)
    {
        $sementara = Sementara::find($request->id);
        $barang = Barang::find($sementara->barang_id);

        if($barang->stock < $request->qty){
            return redirect()->back()->with('error','Jumlah Barang tidak boleh lebih dari stock '.$barang->stock);
        }else{
            $sementara->update([
                'qty' => $request->qty,
            ]);
        }

        return redirect()->route('rfq.create')->with('success','Data Berhasil Dirubah');
    }

    public function deleteSementara($id)
    {
        Sementara::find($id)->delete();

        return redirect()->back()->with('success','Data Berhasil Dirubah');
    }

    public function store(Request $request)
    {
        $cek_rfq = Rfq::where('no_rfq', $request->no_rfq)->count();
        if($cek_rfq > 0) {
            return redirect()->back()->with('error','No Rfq tersebut sudah digunakan, mohon untuk menggunakan no rfq yang lain');
        }

        $cek_sementara = Sementara::where('user_id', auth()->user()->id)->count();

        if($cek_sementara == 0) {
            return redirect()->back()->with('error2','Barang masih kosong');
        }

        $rfq = Rfq::create([
            'no_rfq' => $request->no_rfq,
            'tgl_rfq' => $request->tgl_rfq,
            'projectname' => $request->projectname,
            'client_id' => $request->client_id,
            'desc' => $request->desc,
        ]);

        $sementara = Sementara::where('user_id', auth()->user()->id)->get();

        foreach($sementara as $row){
            RfqDetail::create([
                'rfq_id' => $rfq->id,
                'barang_id' => $row->barang_id,
                'qty' => $row->qty
            ]);
        }

        Sementara::where('user_id', auth()->user()->id)->delete();

        return redirect()->route('rfq.index')->with('success','Data Berhasil Ditambahkan');
    }

    public function view($id)
    {
        $data['rfq'] = Rfq::find($id);
        $data['rfq_detail'] = RfqDetail::where('rfq_id', $id)->get();
        return view('rfq.view', $data);
    }

}
