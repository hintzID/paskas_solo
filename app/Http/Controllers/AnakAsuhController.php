<?php

namespace App\Http\Controllers;

use App\Models\AnakAsuh;
use App\Models\CalonMitra;
use App\Models\KeteranganAnakAsuh;
use Illuminate\Http\Request;

class AnakAsuhController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');

        $anakAsuhs = AnakAsuh::when($keyword, function ($query) use ($keyword) {
            $query->whereHas('calonMitra', function ($q) use ($keyword) {
                $q->where('nama_pondok', 'like', "%{$keyword}%");
            });
        })
        ->with('calonMitra')
        ->paginate(10);

        return view('anak_asuh.index', compact('anakAsuhs', 'keyword'));
    }

    public function create()
    {   
        $calonMitras = CalonMitra::all();
        $keteranganAnakAsuhs = KeteranganAnakAsuh::all();
        return view('anak_asuh.create', compact('calonMitras','keteranganAnakAsuhs'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'jumlah_tk' => 'nullable|integer',
            'jumlah_sd' => 'nullable|integer',
            'jumlah_smp' => 'nullable|integer',
            'jumlah_sma' => 'nullable|integer',
            'jumlah_kuliah' => 'nullable|integer',
            'keterangan_anak_asuh_id' => 'nullable|exists:keterangan_anak_asuh,id',
            'calon_mitra_id' => 'nullable|exists:calon_mitra,id',
        ]);
    
        $anakAsuh = new AnakAsuh();
        $anakAsuh->jumlah_tk = $validatedData['jumlah_tk'];
        $anakAsuh->jumlah_sd = $validatedData['jumlah_sd'];
        $anakAsuh->jumlah_smp = $validatedData['jumlah_smp'];
        $anakAsuh->jumlah_sma = $validatedData['jumlah_sma'];
        $anakAsuh->jumlah_kuliah = $validatedData['jumlah_kuliah'];
        $anakAsuh->keterangan_anak_asuh_id = $validatedData['keterangan_anak_asuh_id'];
        $anakAsuh->calon_mitra_id = $validatedData['calon_mitra_id'];
        $anakAsuh->save();
    
        return redirect()->back()->with('success', 'Data Anak Asuh berhasil ditambahkan.');
    }
    

    public function show($id)
    {
        $anakAsuh = AnakAsuh::findOrFail($id);

        return view('anak_asuh.show', compact('anakAsuh'));
    }

    public function edit($id)
    {
        $anakAsuh = AnakAsuh::findOrFail($id);
        $keteranganAnakAsuhs = KeteranganAnakAsuh::all();
        $calonMitras = CalonMitra::all();

        return view('anak_asuh.edit', compact('anakAsuh','keteranganAnakAsuhs','calonMitras'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jumlah_tk' => 'nullable|integer',
            'jumlah_sd' => 'nullable|integer',
            'jumlah_smp' => 'nullable|integer',
            'jumlah_sma' => 'nullable|integer',
            'jumlah_kuliah' => 'nullable|integer',
            'keterangan_anak_asuh_id' => 'nullable|exists:keterangan_anak_asuh,id',
            'calon_mitra_id' => 'nullable|exists:calon_mitra,id',
        ]);

        $anakAsuh = AnakAsuh::findOrFail($id);
        $anakAsuh->update($request->all());

        return redirect()->route('anak_asuh.index')->with('success', 'Data Anak Asuh berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $anakAsuh = AnakAsuh::findOrFail($id);
        $anakAsuh->delete();

        return redirect()->route('anak_asuh.index')->with('success', 'Data Anak Asuh berhasil dihapus.');
    }
}
