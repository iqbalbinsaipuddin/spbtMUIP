<?php

namespace App\Http\Controllers;

use App\Models\MaklumatAktiviti;
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
        // dd($aktivitis->nama_aktiviti);
        return view('maklumat_aktiviti.index', compact('aktivitis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        dd('Borang Maklumat Aktiviti');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(MaklumatAktiviti $maklumatAktiviti)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MaklumatAktiviti $maklumatAktiviti)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MaklumatAktiviti $maklumatAktiviti)
    {
        //
    }
}
