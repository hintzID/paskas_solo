<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\User;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Anggota::query();

        if ($search) {
            $query->where('nama_lengkap', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%');
        }

        $anggotas = $query->paginate(10);

        return view('anggota.index', compact('anggotas', 'search'));
    }


    public function forms(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:anggotas,email',
            'nama_lengkap' => 'required',
        ]);

        $anggota = new Anggota();
        $anggota->email = $request->input('email');
        $anggota->nama_lengkap = $request->input('nama_lengkap');
        $anggota->jenis_kelamin = $request->input('jenis_kelamin');
        $anggota->kota_tempat_lahir = $request->input('kota_tempat_lahir');
        $anggota->tanggal_lahir = $request->input('tanggal_lahir');
        $anggota->alamat_lengkap = $request->input('alamat_lengkap');
        $anggota->status = $request->input('status');
        $anggota->pekerjaan = $request->input('pekerjaan');
        $anggota->no_telepon = $request->input('no_telepon');
        $anggota->verifikasi = $request->has('verifikasi');
        $anggota->pilihan_kontribusi = $request->input('pilihan_kontribusi');

        $anggota->save();

        return redirect()->route('anggota.anggota')->with('success', 'Anggota berhasil ditambahkan.');
    }

    public function create()
    {
        return view('anggota.create');
    }




    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:anggotas,email',
            'nama_lengkap' => 'required',
        ]);

        $anggota = new Anggota();
        $anggota->email = $request->input('email');
        $anggota->nama_lengkap = $request->input('nama_lengkap');
        $anggota->jenis_kelamin = $request->input('jenis_kelamin');
        $anggota->kota_tempat_lahir = $request->input('kota_tempat_lahir');
        $anggota->tanggal_lahir = $request->input('tanggal_lahir');
        $anggota->alamat_lengkap = $request->input('alamat_lengkap');
        $anggota->status = $request->input('status');
        $anggota->pekerjaan = $request->input('pekerjaan');
        $anggota->no_telepon = $request->input('no_telepon');
        $anggota->verifikasi = $request->has('verifikasi');
        $anggota->pilihan_kontribusi = $request->input('pilihan_kontribusi');

        $anggota->save();

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil ditambahkan');

    }


    public function edit($id)
    {   
        
        $anggota = Anggota::findOrFail($id);
        return view('anggota.edit', compact('anggota'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|unique:anggotas,email,' . $id,
            'nama_lengkap' => 'required',
        ]);
    
        $anggota = Anggota::find($id);
        $anggota->email = $request->input('email');
        $anggota->nama_lengkap = $request->input('nama_lengkap');
        $anggota->jenis_kelamin = $request->input('jenis_kelamin');
        $anggota->kota_tempat_lahir = $request->input('kota_tempat_lahir');
        $anggota->tanggal_lahir = $request->input('tanggal_lahir');
        $anggota->alamat_lengkap = $request->input('alamat_lengkap');
        $anggota->status = $request->input('status');
        $anggota->pekerjaan = $request->input('pekerjaan');
        $anggota->no_telepon = $request->input('no_telepon');
        $anggota->verifikasi = $request->has('verifikasi');
        $anggota->pilihan_kontribusi = $request->input('pilihan_kontribusi');
    
        $anggota->save();
    
        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil diperbarui.');
    }
    

    public function show($id)
    {   
        $anggota = Anggota::findOrFail($id);
        return view('anggota.show', compact('anggota'));
    }

    public function destroy($id)
    {
        // Find the anggota by id
        $anggota = Anggota::findOrFail($id);
    
        // Find and delete the associated user if exists
        $user = User::where('email', $anggota->email)->first();
        if ($user) {
            $user->delete();
        }
    
        // Delete the anggota
        $anggota->delete();
    
        return redirect()->route('anggota.index')->with('success', 'Anggota deleted successfully');
    }
}
