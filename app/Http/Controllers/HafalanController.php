<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\kelas;
use App\Anggota;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
class HafalanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
         $this->middleware('auth');
     }

    public function index()
    {
      if(Auth::user()->level == 'user') {
          Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
          return redirect()->to('/');
      }
      $kelas = Kelas::all();
      $hafalan = Anggota::get();

      return view('hafalan.index', compact('hafalan','kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      if((Auth::user()->level == 'user') && (Auth::user()->id != $id)) {
              Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
              return redirect()->to('/');
      }

      $data = Anggota::findOrFail($id);
      // $kelas = kelas::findOrfail($id);
      $users = User::all();
      return view('hafalan.edit', compact('data','users','kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      Anggota::find($id)->update($request->all());
      alert()->success('Berhasil.','Hafalan telah diperbarui!');
      return redirect()->to('hafalan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
