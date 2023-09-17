<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MaklumatAktiviti;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        // dd('Selamat datang ke Maklumat Aktiviti!');
        // dd($request->tahun);
        if($request->tahun==null)
            $current_year=date('Y');
        else
            $current_year=$request->tahun;
        
        $listtahun= MaklumatAktiviti::select('tahun')->distinct()->get();
        $aktivitis = MaklumatAktiviti::where('tahun', $current_year)->groupBy('jenis')->selectRaw('count(*) as total, jenis')->selectRaw('sum(peruntukan) as peruntukan, jenis')->get();

        // dd($aktivitis->nama_aktiviti);
        return view('laporan_aktiviti.index', compact('aktivitis','listtahun','current_year'));
    }
}
