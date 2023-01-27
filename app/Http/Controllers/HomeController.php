<?php

namespace App\Http\Controllers;

use App\Models\DoModel;
use App\Models\Inv;
use App\Models\Jurnal;
use App\Models\Rfq;
use Illuminate\Http\Request;

class HomeController extends Controller
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
        $data['rfq'] = Rfq::count();
        $data['inv'] = Inv::count();
        $data['do'] = DoModel::count();
        $data['jurnal'] = Jurnal::count();
        return view('home', $data);
    }
}
