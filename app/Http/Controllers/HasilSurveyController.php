<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\HasilSurvey;
use App\Models\CalonMitra;


class HasilSurveyController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');

        $hasilSurveys = HasilSurvey::when($keyword, function ($query) use ($keyword) {
            $query->whereHas('calonMitra', function ($q) use ($keyword) {
                $q->where('nama_pondok', 'like', "%{$keyword}%");
            });
        })
        ->with('calonMitra')
        ->paginate(10);

        return view('hasil_survey.index', compact('hasilSurveys', 'keyword'));
    }

    public function create()
    {
        $calonMitras = CalonMitra::all();
        return view('hasil_survey.create', compact('calonMitras'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'calon_mitra_id' => 'required|exists:calon_mitra,id',
            'tingkat_layak' => 'required|string',
            'prioritas' => 'required|string',
        ]);
    
        // Cek apakah data dengan calon_mitra_id yang sama sudah ada
        $existingData = HasilSurvey::where('calon_mitra_id', $validatedData['calon_mitra_id'])->first();
        if ($existingData) {
            Session::flash('error', 'Data Pondok Sudah ada, hubungi admin bila salah input');
            return redirect()->back()->withInput();
        }
    
        HasilSurvey::create($validatedData);
    
        return redirect()->back()->with('success', 'Data Hasil Survey berhasil ditambahkan.');
    }
    

    public function show($id)
    {
        $hasilSurvey = HasilSurvey::findOrFail($id);
        return view('hasil_survey.show', compact('hasilSurvey'));
    }

    public function edit($id)
    {
        $hasilSurvey = HasilSurvey::findOrFail($id);
        $calonMitras = CalonMitra::all();
        return view('hasil_survey.edit', compact('hasilSurvey', 'calonMitras'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'calon_mitra_id' => 'required|exists:calon_mitra,id',
            'tingkat_layak' => 'required|string',
            'prioritas' => 'required|string',
        ]);

        $hasilSurvey = HasilSurvey::findOrFail($id);
        $hasilSurvey->verifikasi = $request->has('verifikasi');
        $hasilSurvey->update($validatedData);

        return redirect()->route('hasil_survey.index')->with('success', 'Data Hasil Survey berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $hasilSurvey = HasilSurvey::findOrFail($id);
        $hasilSurvey->delete();

        return redirect()->route('hasil_survey.index')->with('success', 'Data Hasil Survey berhasil dihapus.');
    }
}
