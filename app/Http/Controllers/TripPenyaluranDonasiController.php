<?php

namespace App\Http\Controllers;

use App\Models\DonasiMasuk;
use App\Models\Pondok;
use App\Models\Trip;
use App\Models\TripPenyaluranDonasi;
use Illuminate\Http\Request;

class TripPenyaluranDonasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');

        $donations = TripPenyaluranDonasi::query()
            ->when($search, function ($query, $search) {
                return $query->where('nama_trip', 'LIKE', '%' . $search . '%');
            })
            ->paginate(10);

        return view('trip_penyaluran_donasi.index', compact('donations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

        $donasiMasuks = DonasiMasuk::all();
        $trips = Trip::all();
        $pondoks = Pondok::all();
        // dd($pondoks);
        return view('trip_penyaluran_donasi.create', compact('donasiMasuks','trips','pondoks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi inputan jika diperlukan

        // Simpan data ke database
        TripPenyaluranDonasi::create($request->all());

        // Redirect ke halaman index atau halaman lainnya jika diperlukan
        return redirect()->route('trip_penyaluran_donasi.index')->with('success', 'Data berhasil disimpan.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TripPenyaluranDonasi  $tripPenyaluranDonasi
     * @return \Illuminate\Http\Response
     */
    public function edit($trip_penyaluran_donasi)
    {   
        $donation = TripPenyaluranDonasi::findOrFail($trip_penyaluran_donasi);
        $donasiMasuks = DonasiMasuk::all();
        $trips = Trip::all();
        $pondoks = Pondok::all();
        return view('trip_penyaluran_donasi.edit', compact('donation', 'donasiMasuks', 'trips', 'pondoks'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TripPenyaluranDonasi  $tripPenyaluranDonasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TripPenyaluranDonasi $tripPenyaluranDonasi)
    {
        // Validasi inputan jika diperlukan

        // Update data di database
        $tripPenyaluranDonasi->update($request->all());

        // Redirect ke halaman index atau halaman lainnya jika diperlukan
        return redirect()->route('trip_penyaluran_donasi.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TripPenyaluranDonasi  $tripPenyaluranDonasi
     * @return \Illuminate\Http\Response
     */
    public function show(TripPenyaluranDonasi $tripPenyaluranDonasi)
    {
        return view('trip_penyaluran_donasi.show', compact('tripPenyaluranDonasi'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TripPenyaluranDonasi  $tripPenyaluranDonasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(TripPenyaluranDonasi $tripPenyaluranDonasi)
    {
        // Hapus data dari database
        $tripPenyaluranDonasi->delete();

        // Redirect ke halaman index atau halaman lainnya jika diperlukan
        return redirect()->route('trip_penyaluran_donasi.index')->with('success', 'Data berhasil dihapus.');
    }
}
