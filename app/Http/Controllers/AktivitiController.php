<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Aktiviti;
use App\Models\Pengguna;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AktivitiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // dd('Selamat datang ke Maklumat Aktiviti!');
        if($request->tahun==null)
            $current_year=date('Y');
        else
            $current_year=$request->tahun;
      
        $listtahun= Aktiviti::select('tahun')->distinct()->orderBy('tahun','asc')->get();
        if($request->tahun=='SEMUA')
            $aktivitis = Aktiviti::with('pengguna')->get();
        else
            $aktivitis = Aktiviti::with('pengguna')->where('tahun', $current_year)->get();
        return view('maklumat_aktiviti.index', compact('aktivitis','listtahun','current_year'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        $current_user = Pengguna::find(auth()->user()->id_pengguna);
        // dd($current_user,auth()->user());
        // dd('Borang Maklumat Aktiviti');
        return view('maklumat_aktiviti.create', compact('current_user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'tahun'=>'required|digits:4',
            'tarikh_mula'=>'required|date',
            'tarikh_akhir'=>'required|date',
            'jenis'=>'required',
            'nama_aktiviti'=>'required|max:100',
            'peruntukan'=>'required|decimal:0,2',
            'catatan'=>'required|max:100'
         ]);

        // dd($request,Auth::user()->email);
        // dd('Maklumat anda telah disimpan');
        $aktiviti = new Aktiviti;
        $aktiviti->tahun = $request->tahun;
        $aktiviti->tarikh_mula = $request->tarikh_mula;
        $aktiviti->tarikh_akhir = $request->tarikh_akhir;
        $aktiviti->jenis = $request->jenis;
        $aktiviti->nama_aktiviti = $request->nama_aktiviti;
        $aktiviti->peruntukan = $request->peruntukan;
        $aktiviti->catatan = $request->catatan;
        $aktiviti->rid_pengguna = Auth::user()->id_pengguna;
        $aktiviti->save();

        return redirect()->route("aktiviti.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Aktiviti $Aktiviti)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // dd('Nak ubah apa');
        $maklumat_aktiviti = Aktiviti::find($id);
        $current_user = Pengguna::find(auth()->user()->id_pengguna);
        // dd($current_user);
        // $maklumat_aktiviti = Aktiviti::find(4);
        // dd($id,$maklumat_aktiviti);
        return view('maklumat_aktiviti.edit', compact('maklumat_aktiviti','current_user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $this->validate($request,[
            'tahun'=>'required|digits:4',
            'tarikh_mula'=>'required|date',
            'tarikh_akhir'=>'required|date',
            'jenis'=>'required',
            'nama_aktiviti'=>'required|max:100',
            'peruntukan'=>'required|decimal:0,2',
            'catatan'=>'required|max:100'
         ]);
        // dd($request,Auth::user()->email);
        // dd('Maklumat anda telah disimpan');
        $aktiviti = Aktiviti::find($id);
        // $aktiviti->nama = $request->nama;
        // $aktiviti->unit = $request->unit;
        $aktiviti->tahun = $request->tahun;
        $aktiviti->tarikh_mula = $request->tarikh_mula;
        $aktiviti->tarikh_akhir = $request->tarikh_akhir;
        $aktiviti->jenis = $request->jenis;
        $aktiviti->nama_aktiviti = $request->nama_aktiviti;
        $aktiviti->peruntukan = $request->peruntukan;
        $aktiviti->catatan = $request->catatan;
        $aktiviti->rid_pengguna = Auth::user()->id_pengguna;
        $aktiviti->save();

        return redirect()->route("aktiviti.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        // dd($id_aktiviti);
        $maklumat_aktiviti = Aktiviti::find($request->id_aktiviti);
        $maklumat_aktiviti->delete();

        return redirect()->route("aktiviti.index");
    }
}
