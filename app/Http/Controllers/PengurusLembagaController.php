<?php

namespace App\Http\Controllers;

use App\Models\PengurusLembaga;
use Illuminate\Http\Request;

class PengurusLembagaController extends Controller
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

        $pengurusLembagas = PengurusLembaga::when($keyword, function ($query, $keyword) {
            $query->where('nama', 'like', "%$keyword%")
                ->orWhere('profesi', 'like', "%$keyword%")
                ->orWhere('alamat', 'like', "%$keyword%");
        })->paginate(10);

        return view('pengurus_lembaga.index', compact('pengurusLembagas', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengurus_lembaga.create');
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
            'nama' => 'required',
            'profesi' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);

        PengurusLembaga::create($request->all());

        return redirect()->back()->with('success', 'Pengurus Lembaga berhasil ditambahkan.');
            
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PengurusLembaga  $pengurusLembaga
     * @return \Illuminate\Http\Response
     */
    public function edit(PengurusLembaga $pengurusLembaga)
    {
        return view('pengurus_lembaga.edit', compact('pengurusLembaga'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PengurusLembaga  $pengurusLembaga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PengurusLembaga $pengurusLembaga)
    {
        $request->validate([
            'nama' => 'required',
            'profesi' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);

        $pengurusLembaga->update($request->all());

        return redirect()->route('pengurus_lembaga.index')
            ->with('success', 'Pengurus Lembaga berhasil diperbarui.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PengurusLembaga  $pengurusLembaga
     * @return \Illuminate\Http\Response
     */
    public function show(PengurusLembaga $pengurusLembaga)
    {
        return view('pengurus_lembaga.show', compact('pengurusLembaga'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PengurusLembaga  $pengurusLembaga
     * @return \Illuminate\Http\Response
     */
    public function destroy(PengurusLembaga $pengurusLembaga)
    {
        $pengurusLembaga->delete();

        return redirect()->route('pengurus_lembaga.index')
            ->with('success', 'Pengurus Lembaga berhasil dihapus.');
    }
}
