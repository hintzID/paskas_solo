<?php

namespace App\Http\Controllers;

use App\Models\FasilitasPondok;
use Illuminate\Http\Request;

class FasilitasPondokController extends Controller
{
    /**
     * Menampilkan daftar fasilitas pondok.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $fasilitasPondok = FasilitasPondok::all();
        return view('fasilitas-pondok.index', compact('fasilitasPondok'));
    }

    /**
     * Menampilkan halaman tambah fasilitas pondok.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('fasilitas-pondok.create');
    }

    /**
     * Menyimpan fasilitas pondok baru ke dalam database.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_fasilitas' => 'required|string',
        ]);

        FasilitasPondok::create($validatedData);

        return redirect()->route('fasilitas-pondok.index')
            ->with('success', 'Fasilitas Pondok berhasil ditambahkan.');
    }

    /**
     * Menampilkan halaman edit fasilitas pondok.
     *
     * @param  FasilitasPondok  $fasilitasPondok
     * @return \Illuminate\View\View
     */
    public function edit(FasilitasPondok $fasilitasPondok)
    {
        return view('fasilitas-pondok.edit', compact('fasilitasPondok'));
    }

    /**
     * Mengupdate fasilitas pondok yang telah diubah.
     *
     * @param  Request  $request
     * @param  FasilitasPondok  $fasilitasPondok
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, FasilitasPondok $fasilitasPondok)
    {
        $validatedData = $request->validate([
            'nama_fasilitas' => 'required|string',
        ]);

        $fasilitasPondok->update($validatedData);

        return redirect()->route('fasilitas-pondok.index')
            ->with('success', 'Fasilitas Pondok berhasil diperbarui.');
    }

    /**
     * Menghapus fasilitas pondok dari database.
     *
     * @param  FasilitasPondok  $fasilitasPondok
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(FasilitasPondok $fasilitasPondok)
    {
        $fasilitasPondok->delete();

        return redirect()->route('fasilitas-pondok.index')
            ->with('success', 'Fasilitas Pondok berhasil dihapus.');
    }
}
