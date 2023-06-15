@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Detail Calon Mitra</div>

            <div class="card-body">
                <div class="form-group">
                    <label for="nama_pondok">Nama Pondok:</label>
                    <input type="text" class="form-control" id="nama_pondok" value="{{ $calonMitra->nama_pondok }}" readonly>
                </div>

                <div class="form-group">
                    <label for="tanggal_berdiri">Tanggal Berdiri:</label>
                    <input type="text" class="form-control" id="tanggal_berdiri" value="{{ $calonMitra->tanggal_berdiri }}" readonly>
                </div>

                <div class="form-group">
                    <label for="alamat_lengkap">Alamat Lengkap:</label>
                    <input type="text" class="form-control" id="alamat_lengkap" value="{{ $calonMitra->alamat_lengkap }}" readonly>
                </div>

                <div class="form-group">
                    <label for="pengurus_lembaga_id">ID Pengurus Lembaga:</label>
                    <input type="text" class="form-control" id="pengurus_lembaga_id" value="{{ $calonMitra->pengurus_lembaga_id }}" readonly>
                </div>

                <div class="form-group">
                    <label for="sumber_dana_operasional">Sumber Dana Operasional:</label>
                    <input type="text" class="form-control" id="sumber_dana_operasional" value="{{ $calonMitra->sumber_dana_operasional }}" readonly>
                </div>

                
                <div class="form-group">
                    <label for="jumlah_pengurus_menetap">Jumlah Pengurus Menetap:</label>
                    <input type="text" class="form-control" value="{{ $calonMitra->jumlah_pengurus_menetap }}" readonly>
                </div>

                <div class="form-group">
                    <label for="jumlah_pengurus_tidak_menetap">Jumlah Pengurus Tidak Menetap:</label>
                    <input type="text" class="form-control" value="{{ $calonMitra->jumlah_pengurus_tidak_menetap }}" readonly>
                </div>
                <br>
                <a href="{{ route('calon_mitra.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
@endsection
