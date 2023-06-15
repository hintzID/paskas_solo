@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Hasil Survey</h1>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('hasil_survey.update', $hasilSurvey->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="calon_mitra_id">Nama Pondok</label>
                        <select name="calon_mitra_id" id="calon_mitra_id" class="form-control">
                            @foreach ($calonMitras as $calonMitra)
                                <option value="{{ $calonMitra->id }}" {{ $hasilSurvey->calon_mitra_id == $calonMitra->id ? 'selected' : '' }}>{{ $calonMitra->nama_pondok }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tingkat_layak">Tingkat Kelayakan</label>
                        <select name="tingkat_layak" id="tingkat_layak" class="form-control" required>
                            <option value="">Pilih Tingkat Kelayakan</option>
                            <option value="layak" {{ $hasilSurvey->tingkat_layak == 'layak' ? 'selected' : '' }}>Layak</option>
                            <option value="belum" {{ $hasilSurvey->tingkat_layak == 'belum' ? 'selected' : '' }}>Belum Layak</option>
                            <option value="tidak" {{ $hasilSurvey->tingkat_layak == 'tidak' ? 'selected' : '' }}>Tidak Layak</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="prioritas">Prioritas</label>
                        <select name="prioritas" id="prioritas" class="form-control" required>
                            <option value="">Pilih Prioritas</option>
                            <option value="mendesak" {{ $hasilSurvey->prioritas == 'mendesak' ? 'selected' : '' }}>Mendesak</option>
                            <option value="tidak" {{ $hasilSurvey->prioritas == 'tidak' ? 'selected' : '' }}>Tidak Mendesak</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" name="verifikasi" id="verifikasi" class="form-check-input" {{ old('verifikasi', $hasilSurvey->verifikasi) ? 'checked' : '' }}>
                            <label for="verifikasi" class="form-check-label">Verifikasi</label>
                        </div>
                        @error('verifikasi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <br>

                    <button type="submit" class="btn btn-primary">Simpan</button> &nbsp;
                    <a href="{{ route('hasil_survey.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection
