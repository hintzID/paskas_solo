@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tambah Calon Mitra</div>
         
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <div class="card-body">
                        <form action="{{ route('calon_mitra.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="nama_pondok">Nama Pondok</label>
                                <input type="text" name="nama_pondok" id="nama_pondok" class="form-control @error('nama_pondok') is-invalid @enderror" value="{{ old('nama_pondok') }}" required>
                                @error('nama_pondok')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tanggal_berdiri">Tanggal Berdiri</label>
                                <input type="date" name="tanggal_berdiri" id="tanggal_berdiri" class="form-control @error('tanggal_berdiri') is-invalid @enderror" value="{{ old('tanggal_berdiri') }}" required>
                                @error('tanggal_berdiri')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="alamat_lengkap">Alamat Lengkap</label>
                                <input type="text" name="alamat_lengkap" id="alamat_lengkap" class="form-control @error('alamat_lengkap') is-invalid @enderror" value="{{ old('alamat_lengkap') }}" required>
                                @error('alamat_lengkap')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="pengurus_lembaga_id">Pengurus Lembaga</label>
                                <select name="pengurus_lembaga_id" id="pengurus_lembaga_id" class="form-control @error('pengurus_lembaga_id') is-invalid @enderror" required>
                                    <option value="">Pilih Pengurus Lembaga</option>
                                    @foreach ($pengurusLembaga as $pengurus)
                                        <option value="{{ $pengurus->id }}">{{ $pengurus->nama }}</option>
                                    @endforeach
                                </select>
                                @error('pengurus_lembaga_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="sumber_dana_operasional">Sumber Dana Operasional</label>
                                <input type="text" name="sumber_dana_operasional" id="sumber_dana_operasional" class="form-control @error('sumber_dana_operasional') is-invalid @enderror" value="{{ old('sumber_dana_operasional') }}" required>
                                @error('sumber_dana_operasional')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="jumlah_pengurus_menetap">Jumlah Pengurus Menetap</label>
                                <input type="number" name="jumlah_pengurus_menetap" id="jumlah_pengurus_menetap" class="form-control @error('jumlah_pengurus_menetap') is-invalid @enderror" value="{{ old('jumlah_pengurus_menetap') }}" required>
                                @error('jumlah_pengurus_menetap')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="jumlah_pengurus_tidak_menetap">Jumlah Pengurus Tidak Menetap</label>
                                <input type="number" name="jumlah_pengurus_tidak_menetap" id="jumlah_pengurus_tidak_menetap" class="form-control @error('jumlah_pengurus_tidak_menetap') is-invalid @enderror" value="{{ old('jumlah_pengurus_tidak_menetap') }}" required>
                                @error('jumlah_pengurus_tidak_menetap')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <br>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
