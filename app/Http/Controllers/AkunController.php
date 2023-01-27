<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\Barang;
use Illuminate\Http\Request;

class AkunController extends Controller
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
        $data['akun'] = Akun::all();
        return view('akun.index', $data);
    }

    public function create()
    {
        return view('akun.create');
    }

    public function store(Request $request)
    {
        Akun::create([
            'kode_akun' => $request->kode_akun,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('akun.index')->with('success','Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {  
        $data['akun'] = Akun::find($id);
        return view('akun.edit', $data);
    }

    public function update(Request $request)
    {
        Akun::find($request->id)->update([
            'kode_akun' => $request->kode_akun,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('akun.index')->with('success','Data Berhasil Dirubah');
    }

    public function delete($id)
    {
        Akun::find($id)->delete();

        return redirect()->route('akun.index')->with('success','Data Berhasil Dihapus');
    }
}
