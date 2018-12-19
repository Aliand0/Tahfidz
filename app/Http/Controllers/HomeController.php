<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Anggota;
use App\Buku;
use Auth;
use DB;


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
      $jmlsiswa = DB::table('anggota')->count();
      $jmlguru = DB::table('users')->where('level','admin')->count();
      $jmlkelas = DB::table('kelas')->count();
      $anggota   = DB::table('anggota')->get();
      $kelas = DB::table('kelas')->get();

      if(Auth::user()->level == 'user') {
          return view('home', compact('anggota','jmlsiswa','jmlkelas','jmlguru','kelas'));
      }
      else{
        return view('homeAdmin', compact('anggota','jmlsiswa','jmlkelas','jmlguru'));
      }
    }
}
