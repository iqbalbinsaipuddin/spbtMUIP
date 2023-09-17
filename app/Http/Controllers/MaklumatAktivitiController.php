<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\MaklumatAktiviti;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MaklumatAktivitiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd('Selamat datang ke Maklumat Aktiviti!');

        $aktivitis = MaklumatAktiviti::all();
        // dd($aktivitis);
        // dd($aktivitis->nama_aktiviti);
        return view('maklumat_aktiviti.index', compact('aktivitis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        $current_user = User::find(auth()->user()->id);
        // dd('Borang Maklumat Aktiviti');
        return view('maklumat_aktiviti.create', compact('current_user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request,Auth::user()->email);
        // dd('Maklumat anda telah disimpan');
        $aktiviti = new MaklumatAktiviti;
        // $aktiviti->nama = $request->nama;
        // $aktiviti->unit = $request->unit;
        $aktiviti->tahun = $request->tahun;
        $aktiviti->tarikh_mula = $request->tarikh_mula;
        $aktiviti->tarikh_akhir = $request->tarikh_akhir;
        $aktiviti->jenis = $request->jenis;
        $aktiviti->nama_aktiviti = $request->nama_aktiviti;
        $aktiviti->peruntukan = $request->peruntukan;
        $aktiviti->catatan = $request->catatan;
        $aktiviti->rid_pengguna = Auth::user()->id;
        $aktiviti->save();

        return redirect()->route("aktiviti.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(MaklumatAktiviti $maklumatAktiviti)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // dd('Nak ubah apa');
        $maklumat_aktiviti = MaklumatAktiviti::find($id);
        $current_user = User::find(auth()->user()->id);
        // $maklumat_aktiviti = MaklumatAktiviti::find(4);
        // dd($id,$maklumat_aktiviti);
        return view('maklumat_aktiviti.edit', compact('maklumat_aktiviti','current_user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request,Auth::user()->email);
        // dd('Maklumat anda telah disimpan');
        $aktiviti = MaklumatAktiviti::find($id);
        // $aktiviti->nama = $request->nama;
        // $aktiviti->unit = $request->unit;
        $aktiviti->tahun = $request->tahun;
        $aktiviti->tarikh_mula = $request->tarikh_mula;
        $aktiviti->tarikh_akhir = $request->tarikh_akhir;
        $aktiviti->jenis = $request->jenis;
        $aktiviti->nama_aktiviti = $request->nama_aktiviti;
        $aktiviti->peruntukan = $request->peruntukan;
        $aktiviti->catatan = $request->catatan;
        $aktiviti->rid_pengguna = Auth::user()->id;
        $aktiviti->save();

        return redirect()->route("aktiviti.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        // dd('Your data has been deleted!');
        $maklumat_aktiviti = MaklumatAktiviti::find($request->id_aktiviti);
        $maklumat_aktiviti->delete();

        return redirect()->route("aktiviti.index");
    }
}
