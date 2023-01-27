<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
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
        $data['admin'] = User::where('level','admin')->get();
        return view('admin.index', $data);
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'level' => 'admin',
        ]);

        return redirect()->route('admin.index')->with('success','Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {  
        $data['admin'] = User::find($id);
        return view('admin.edit', $data);
    }

    public function update(Request $request)
    {
        User::find($request->id)->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.index')->with('success','Data Berhasil Dirubah');
    }

    public function delete($id)
    {
        User::find($id)->delete();

        return redirect()->route('admin.index')->with('success','Data Berhasil Dihapus');
    }
}
