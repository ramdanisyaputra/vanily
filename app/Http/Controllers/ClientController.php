<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
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
        $data['client'] = Client::all();
        return view('client.index', $data);
    }

    public function create()
    {
        return view('client.create');
    }

    public function store(Request $request)
    {
        Client::create([
            'companyname' => $request->companyname,
            'contactperson' => $request->contactperson,
            'title' => $request->title,
            'job' => $request->job,
        ]);

        return redirect()->route('client.index')->with('success','Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {  
        $data['client'] = Client::find($id);
        return view('client.edit', $data);
    }

    public function update(Request $request)
    {
        Client::find($request->id)->update([
            'companyname' => $request->companyname,
            'contactperson' => $request->contactperson,
            'title' => $request->title,
            'job' => $request->job,
        ]);

        return redirect()->route('client.index')->with('success','Data Berhasil Dirubah');
    }

    public function delete($id)
    {
        Client::find($id)->delete();

        return redirect()->route('client.index')->with('success','Data Berhasil Dihapus');
    }
}
