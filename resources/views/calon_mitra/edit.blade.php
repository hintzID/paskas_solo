@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Edit Calon Mitra</div>

            <div class="card-body">
                <form action="{{ route('calon_mitra.update', $calonMitra->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="nama_pondok">Nama Pondok:</label>
                        <input type="text" class="form-control" id="nama_pondok" name="nama_pondok" value="{{ $calonMitra->nama_pondok }}" required>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_berdiri">Tanggal Berdiri:</label>
                        <input type="date" class="form-control" id="tanggal_berdiri" name="tanggal_berdiri" value="{{ $calonMitra->tanggal_berdiri }}" required>
                    </div>

                    <div class="form-group">
                        <label for="alamat_lengkap">Alamat Lengkap:</label>
                        <input type="text" class="form-control" id="alamat_lengkap" name="alamat_lengkap" value="{{ $calonMitra->alamat_lengkap }}" required>
                    </div>

                    <div class="form-group">
                        <label for="pengurus_lembaga_id">Pengurus Lembaga:</label>
                        <select class="form-control" id="pengurus_lembaga_id" name="pengurus_lembaga_id" required>
                            <option value="">Pilih Pengurus Lembaga</option>
                            @foreach ($pengurusLembaga as $pengurusLembaga)
                                <option value="{{ $pengurusLembaga->id }}" {{ $pengurusLembaga->id == $calonMitra->pengurusLembaga->id ? 'selected' : '' }}>
                                    {{ $pengurusLembaga->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    

                    <div class="form-group">
                        <label for="sumber_dana_operasional">Sumber Dana Operasional:</label>
                        <input type="text" class="form-control" id="sumber_dana_operasional" name="sumber_dana_operasional" value="{{ $calonMitra->sumber_dana_operasional }}" required>
                    </div>

                    
                    <div class="form-group">
                        <label for="jumlah_pengurus_menetap">Jumlah Pengurus Menetap:</label>
                        <input type="number" name="jumlah_pengurus_menetap" id="jumlah_pengurus_menetap" class="form-control @error('jumlah_pengurus_menetap') is-invalid @enderror" value="{{ old('jumlah_pengurus_menetap', $calonMitra->jumlah_pengurus_menetap) }}" required>
                        @error('jumlah_pengurus_menetap')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="jumlah_pengurus_tidak_menetap">Jumlah Pengurus Tidak Menetap:</label>
                        <input type="number" name="jumlah_pengurus_tidak_menetap" id="jumlah_pengurus_tidak_menetap" class="form-control @error('jumlah_pengurus_tidak_menetap') is-invalid @enderror" value="{{ old('jumlah_pengurus_tidak_menetap', $calonMitra->jumlah_pengurus_tidak_menetap) }}" required>
                        @error('jumlah_pengurus_tidak_menetap')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <br>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
