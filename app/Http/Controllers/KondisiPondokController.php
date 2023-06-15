<?php

namespace App\Http\Controllers;

use App\Models\KondisiPondok;
use App\Models\FasilitasPondok;
use App\Models\CalonMitra;

use Illuminate\Http\Request;

class KondisiPondokController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
    
        $kondisiPondoks = KondisiPondok::when($keyword, function ($query) use ($keyword) {
            $query->whereHas('fasilitasPondok', function ($q) use ($keyword) {
                $q->where('nama_fasilitas', 'like', "%{$keyword}%");
            })->orWhereHas('calonMitra', function ($q) use ($keyword) {
                $q->where('nama_pondok', 'like', "%{$keyword}%");
            });
        })
        ->with(['fasilitasPondok', 'calonMitra'])
        ->paginate(10);
    
        return view('kondisi_pondok.index', compact('kondisiPondoks', 'keyword'));
    }
    

    public function create()
    {
        $fasilitasPondoks = FasilitasPondok::all();
        $calonMitras = CalonMitra::all();
        return view('kondisi_pondok.create', compact('fasilitasPondoks', 'calonMitras'));
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'calon_mitra_id' => 'required|exists:calon_mitra,id',
            'fasilitas_pondok.*' => 'required|exists:fasilitas_pondok,id',
            'jumlah.*' => 'nullable|integer',
            'kondisi.*' => 'nullable|string',
            'keterangan.*' => 'nullable|string',
        ]);
    
        $calonMitraId = $validatedData['calon_mitra_id'];
        $fasilitasPondok = $validatedData['fasilitas_pondok'];
    
        foreach ($fasilitasPondok as $index => $fasilitasId) {
            KondisiPondok::create([
                'calon_mitra_id' => $calonMitraId,
                'fasilitas_pondok_id' => $fasilitasId,
                'jumlah' => $validatedData['jumlah'][$index] ?? null,
                'kondisi' => $validatedData['kondisi'][$index] ?? null,
                'keterangan' => $validatedData['keterangan'][$index] ?? null,
            ]);
        }
    
        return redirect()->back()->with('success', 'Data Kondisi Pondok berhasil ditambahkan.');
    }
    
    
    public function show($id)
    {
        $kondisiPondok = KondisiPondok::findOrFail($id);

        return view('kondisi_pondok.show', compact('kondisiPondok'));
    }

    public function edit($id)
    {
        $kondisiPondok = KondisiPondok::findOrFail($id);
        $fasilitasPondoks = FasilitasPondok::all();
        $calonMitras = CalonMitra::all();

        return view('kondisi_pondok.edit', compact('kondisiPondok', 'fasilitasPondoks', 'calonMitras'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'fasilitas_pondok_id' => 'required|exists:fasilitas_pondok,id',
            'calon_mitra_id' => 'required|exists:calon_mitra,id',
            'jumlah' => 'nullable|integer',
            'kondisi' => 'nullable|string',
            'keterangan' => 'nullable|string',
        ]);

        $kondisiPondok = KondisiPondok::findOrFail($id);
        $kondisiPondok->update($validatedData);

        return redirect()->route('kondisi_pondok.index')->with('success', 'Data Kondisi Pondok berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kondisiPondok = KondisiPondok::findOrFail($id);
        $kondisiPondok->delete();

        return redirect()->route('kondisi_pondok.index')->with('success', 'Data Kondisi Pondok berhasil dihapus.');
    }
}
