<?php

namespace App\Http\Controllers;

use App\Models\HasilSurvey;
use App\Models\Pondok;
use Illuminate\Http\Request;

class PondokController extends Controller
{
    /**
     * Menampilkan daftar pondok dengan opsi pencarian.
     *
     * @param  Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $pondoks = Pondok::with(['hasilSurvey.calonMitra'])
            ->whereHas('hasilSurvey.calonMitra', function ($query) use ($keyword) {
                $query->where('nama_pondok', 'LIKE', "%$keyword%")
                    ->orWhere('alamat_lengkap', 'LIKE', "%$keyword%");
            })
            ->paginate(10);

        return view('pondok.index', compact('pondoks'));
    }

    /**
     * Menampilkan halaman pembuatan pondok baru.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {   
        $hasilSurvey = HasilSurvey::all();
        return view('pondok.create', compact('hasilSurvey'));
    }

    /**
     * Menyimpan pondok baru ke dalam database.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'hasil_survey_id' => 'required|exists:hasil_survey,id',
            'rencana_jumlah_penyaluran' => 'required|integer',
            'cp' => 'required|string',
            'cp_no_hp' => 'required|string',
        ]);

        Pondok::create($validatedData);

        return redirect()->route('pondok.index')
            ->with('success', 'Pondok berhasil disimpan.');
    }

    /**
     * Menampilkan detail pondok.
     *
     * @param  Pondok  $pondok
     * @return \Illuminate\View\View
     */
    public function show(Pondok $pondok)
    {
        return view('pondok.show', compact('pondok'));
    }

    /**
     * Menampilkan halaman edit pondok.
     *
     * @param  Pondok  $pondok
     * @return \Illuminate\View\View
     */
    public function edit(Pondok $pondok)
    {   
        $hasilSurvey = HasilSurvey::all();
        return view('pondok.edit', compact('pondok','hasilSurvey'));
    }

    /**
     * Mengupdate pondok yang telah diubah.
     *
     * @param  Request  $request
     * @param  Pondok  $pondok
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Pondok $pondok)
    {
        $validatedData = $request->validate([
            'hasil_survey_id' => 'required|exists:hasil_survey,id',
            'rencana_jumlah_penyaluran' => 'required|integer',
            'cp' => 'required|string',
            'cp_no_hp' => 'required|string',
        ]);

        $pondok->update($validatedData);

        return redirect()->route('pondok.index')
            ->with('success', 'Pondok berhasil diperbarui.');
    }

    /**
     * Menghapus pondok dari database.
     *
     * @param  Pondok  $pondok
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Pondok $pondok)
    {
        $pondok->delete();

        return redirect()->route('pondok.index')
            ->with('success', 'Pondok berhasil dihapus.');
    }
}
