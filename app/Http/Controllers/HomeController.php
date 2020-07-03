<?php

namespace App\Http\Controllers;

use App\Pasien;
use App\Pasien2;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $first = Pasien2::select('id', 'user_id', 'nis', 'nama_pasien', 'rombel_id', 'rayon_id', 'jenis_sakit', 'created_at')
            ->with(['rombel', 'rayon', 'user']);

        $all = Pasien::select('id', 'user_id', 'nis', 'nama_pasien', 'rombel_id', 'rayon_id', 'jenis_sakit', 'created_at')
            ->with(['rombel', 'rayon', 'user'])
            ->union($first)
            ->get();

        return view('home', compact('all'));
    }
}
