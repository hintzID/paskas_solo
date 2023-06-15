<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    /**
     * Menampilkan daftar trip.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $trips = Trip::all();

        return view('trip.index', compact('trips'));
    }

    /**
     * Menampilkan halaman pembuatan trip baru.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('trip.create');
    }

    /**
     * Menyimpan trip baru ke dalam database.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_trip' => 'required|string',
            'keterangan' => 'required|string',
        ]);

        Trip::create($validatedData);

        return redirect()->route('trip.index')
            ->with('success', 'Trip berhasil disimpan.');
    }

    /**
     * Menampilkan halaman edit trip.
     *
     * @param  Trip  $trip
     * @return \Illuminate\View\View
     */
    public function edit(Trip $trip)
    {
        return view('trip.edit', compact('trip'));
    }

    /**
     * Mengupdate trip yang telah diubah.
     *
     * @param  Request  $request
     * @param  Trip  $trip
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Trip $trip)
    {
        $validatedData = $request->validate([
            'nama_trip' => 'required|string',
            'keterangan' => 'required|string',
        ]);

        $trip->update($validatedData);

        return redirect()->route('trip.index')
            ->with('success', 'Trip berhasil diperbarui.');
    }

    /**
     * Menghapus trip dari database.
     *
     * @param  Trip  $trip
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Trip $trip)
    {
        $trip->delete();

        return redirect()->route('trip.index')
            ->with('success', 'Trip berhasil dihapus.');
    }
}
