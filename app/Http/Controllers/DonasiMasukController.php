<?php

namespace App\Http\Controllers;

use App\Models\DonasiMasuk;
use Illuminate\Http\Request;

class DonasiMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donasiMasuk = DonasiMasuk::all();
        return view('donasi_masuk.index', compact('donasiMasuk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('donasi_masuk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'donasi_yang_masuk' => 'required',
            'total_donasi' => 'required',
        ]);

        DonasiMasuk::create($request->all());

        return redirect()->route('donasi_masuk.index')
            ->with('success', 'Donasi Masuk berhasil ditambahkan.');
    }

    public function destroy(DonasiMasuk $donasiMasuk)
    {
        $donasiMasuk->delete();

        return redirect()->route('donasi_masuk.index')
            ->with('success', 'Donasi masuk berhasil dihapus.');
    }

    // Metode lain seperti show(), edit(), update(), dan destroy() juga dapat ditambahkan sesuai kebutuhan.

}
