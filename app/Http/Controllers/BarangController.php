<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
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
        $data['barang'] = Barang::all();
        return view('barang.index', $data);
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
    {
        Barang::create([
            'desc' => $request->desc,
            'uom' => $request->uom,
            'type' => $request->type,
            'hrg' => $request->hrg,
            'stock' => $request->stock,
        ]);

        return redirect()->route('barang.index')->with('success','Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {  
        $data['barang'] = Barang::find($id);
        return view('barang.edit', $data);
    }

    public function update(Request $request)
    {
        Barang::find($request->id)->update([
            'desc' => $request->desc,
            'uom' => $request->uom,
            'type' => $request->type,
            'hrg' => $request->hrg,
            'stock' => $request->stock,
        ]);

        return redirect()->route('barang.index')->with('success','Data Berhasil Dirubah');
    }

    public function delete($id)
    {
        Barang::find($id)->delete();

        return redirect()->route('barang.index')->with('success','Data Berhasil Dihapus');
    }
}
