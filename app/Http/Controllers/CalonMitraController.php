<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalonMitra;
use App\Models\PengurusLembaga;

class CalonMitraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');

        $calonMitra = CalonMitra::with('pengurusLembaga')
            ->when($keyword, function ($query) use ($keyword) {
                $query->where('nama_pondok', 'like', "%$keyword%")
                    ->orWhere('alamat_lengkap', 'like', "%$keyword%");
            })
            ->paginate(10);

        return view('calon_mitra.index', compact('calonMitra', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pengurusLembaga = PengurusLembaga::all();

        return view('calon_mitra.create', compact('pengurusLembaga'));
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
            'nama_pondok' => 'required|string',
            'tanggal_berdiri' => 'required|date',
            'alamat_lengkap' => 'required|string',
            'pengurus_lembaga_id' => 'required|exists:pengurus_lembaga,id',
            'sumber_dana_operasional' => 'required|string',
            'jumlah_pengurus_menetap' => 'required|integer',
            'jumlah_pengurus_tidak_menetap' => 'required|integer',
        ]);
    
        $calonMitra = new CalonMitra();
        $calonMitra->nama_pondok = $request->input('nama_pondok');
        $calonMitra->tanggal_berdiri = $request->input('tanggal_berdiri');
        $calonMitra->alamat_lengkap = $request->input('alamat_lengkap');
        $calonMitra->pengurus_lembaga_id = $request->input('pengurus_lembaga_id');
        $calonMitra->sumber_dana_operasional = $request->input('sumber_dana_operasional');
        $calonMitra->jumlah_pengurus_menetap = $request->input('jumlah_pengurus_menetap');
        $calonMitra->jumlah_pengurus_tidak_menetap = $request->input('jumlah_pengurus_tidak_menetap');
        $calonMitra->save();
    
        return redirect()->back()->with('success', 'Calon mitra berhasil ditambahkan.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $calonMitra = CalonMitra::findOrFail($id);

        return view('calon_mitra.show', compact('calonMitra'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $calonMitra = CalonMitra::findOrFail($id);
        $pengurusLembaga = PengurusLembaga::all();

        return view('calon_mitra.edit', compact('calonMitra', 'pengurusLembaga'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pondok' => 'required|string',
            'tanggal_berdiri' => 'required|date',
            'alamat_lengkap' => 'required|string',
            'pengurus_lembaga_id' => 'required|exists:pengurus_lembaga,id',
            'sumber_dana_operasional' => 'required|string',
            'jumlah_pengurus_menetap' => 'required|integer',
            'jumlah_pengurus_tidak_menetap' => 'required|integer',
        ]);

        $calonMitra = CalonMitra::findOrFail($id);
        $calonMitra->update($request->all());

        return redirect()->route('calon_mitra.index')->with('success', 'Calon mitra berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $calonMitra = CalonMitra::findOrFail($id);
        $calonMitra->delete();

        return redirect()->route('calon_mitra.index')->with('success', 'Calon mitra berhasil dihapus.');
    }
}
