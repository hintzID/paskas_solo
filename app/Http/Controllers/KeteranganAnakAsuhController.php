<?php

namespace App\Http\Controllers;

use App\Models\KeteranganAnakAsuh;
use Illuminate\Http\Request;

class KeteranganAnakAsuhController extends Controller
{
    /**
     * Menampilkan daftar keterangan anak asuh.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $keteranganAnakAsuh = KeteranganAnakAsuh::all();

        return view('keterangan_anak_asuh.index', compact('keteranganAnakAsuh'));
    }

    /**
     * Menampilkan form untuk membuat keterangan anak asuh baru.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('keterangan_anak_asuh.create');
    }

    /**
     * Menyimpan keterangan anak asuh baru ke dalam database.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'keterangan' => 'required|string',
        ]);

        KeteranganAnakAsuh::create($validatedData);

        return redirect()->route('keterangan_anak_asuh.index')
            ->with('success', 'Keterangan anak asuh berhasil disimpan.');
    }

    /**
     * Menampilkan detail keterangan anak asuh.
     *
     * @param  KeteranganAnakAsuh  $keteranganAnakAsuh
     * @return \Illuminate\View\View
     */
    public function show(KeteranganAnakAsuh $keteranganAnakAsuh)
    {
        return view('keterangan_anak_asuh.show', compact('keteranganAnakAsuh'));
    }

    /**
     * Menampilkan form untuk mengedit keterangan anak asuh.
     *
     * @param  KeteranganAnakAsuh  $keteranganAnakAsuh
     * @return \Illuminate\View\View
     */
    public function edit(KeteranganAnakAsuh $keteranganAnakAsuh)
    {
        return view('keterangan_anak_asuh.edit', compact('keteranganAnakAsuh'));
    }

    /**
     * Mengupdate keterangan anak asuh yang telah diubah.
     *
     * @param  Request  $request
     * @param  KeteranganAnakAsuh  $keteranganAnakAsuh
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, KeteranganAnakAsuh $keteranganAnakAsuh)
    {
        $validatedData = $request->validate([
            'keterangan' => 'required|string',
        ]);

        $keteranganAnakAsuh->update($validatedData);

        return redirect()->route('keterangan-anak-asuh.index')
            ->with('success', 'Keterangan anak asuh berhasil diperbarui.');
    }

    /**
     * Menghapus keterangan anak asuh dari database.
     *
     * @param  KeteranganAnakAsuh  $keteranganAnakAsuh
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(KeteranganAnakAsuh $keteranganAnakAsuh)
    {
        $keteranganAnakAsuh->delete();

        return redirect()->route('keterangan_anak_asuh.index')
            ->with('success', 'Keterangan anak asuh berhasil dihapus.');
    }
}
