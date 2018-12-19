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
      //untuk index
      $jmlsiswa = DB::table('anggota')->count();
      $jmlguru = DB::table('users')->where('level','admin')->count();
      $jmlkelas = DB::table('kelas')->count();
      $anggota   = DB::table('anggota')->get();
      $kelas = DB::table('kelas')->get();
      //untuk perhitungan grafik
      $A   = DB::table('anggota')->where('kelas_id',1)->get(); // A = Kelas 10 Boarding
      $Ac   = DB::table('anggota')->where('kelas_id',1)->count(); //utk pembagiannya
      $total =0;
      foreach ($A as $angg) {
        $total = $total + ($angg->Juz * $angg->halaman);
      }
      $A_fix = $total/$Ac;

      $B   = DB::table('anggota')->where('kelas_id',2)->get(); // B = Kelas 10 NON-Boarding
      $Bc   = DB::table('anggota')->where('kelas_id',2)->count(); //utk pembagiannya
      $total =0;
      foreach ($B as $angg) {
        $total = $total + ($angg->Juz * $angg->halaman);
      }
      $B_fix = $total/$Bc;

      $C   = DB::table('anggota')->where('kelas_id',3)->get(); // C = Kelas 11 Boarding
      $Cc   = DB::table('anggota')->where('kelas_id',3)->count(); //utk pembagiannya
      $total =0;
      foreach ($C as $angg) {
        $total = $total + ($angg->Juz * $angg->halaman);
      }
      $C_fix = $total/$Cc;

      $D   = DB::table('anggota')->where('kelas_id',4)->get(); // D = Kelas 11 NON-Boarding
      $Dc   = DB::table('anggota')->where('kelas_id',4)->count(); //utk pembagiannya
      $total =0;
      foreach ($D as $angg) {
        $total = $total + ($angg->Juz * $angg->halaman);
      }
      $D_fix = $total/$Dc;

      $E   = DB::table('anggota')->where('kelas_id',5)->get(); // E = Kelas 12 Boarding
      $Ec   = DB::table('anggota')->where('kelas_id',5)->count(); //utk pembagiannya
      $total =0;
      foreach ($E as $angg) {
        $total = $total + ($angg->Juz * $angg->halaman);
      }
      $E_fix = $total/$Ec;

      $F   = DB::table('anggota')->where('kelas_id',6)->get(); // F = Kelas 10 NON-Boarding
      $Fc   = DB::table('anggota')->where('kelas_id',6)->count(); //utk pembagiannya
      $total =0;
      foreach ($F as $angg) {
        $total = $total + ($angg->Juz * $angg->halaman);
      }
      $F_fix = $total/$Fc;



      if(Auth::user()->level == 'user') {
          return view('home', compact('anggota','jmlsiswa','jmlkelas','jmlguru','kelas'));
      }
      else{
        return view('homeAdmin', compact('anggota','jmlsiswa','jmlkelas','jmlguru',
                    'A_fix','B_fix','C_fix', 'D_fix', 'E_fix', 'F_fix'));
      }
    }
}
