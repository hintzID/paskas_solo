@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Tambah Pondok') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('pondok.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="hasil_survey_id">Nama Pondok</label>
                                <select name="hasil_survey_id" class="form-control" required>
                                    <option value="">Pilih Nama Pondok</option>
                                    @foreach ($hasilSurvey as $survey)
                                        <option value="{{ $survey->id }}">{{ $survey->calonMitra->nama_pondok }}</option>
                                    @endforeach
                                </select>
                            </div>
                                                     
                            {{-- <div class="form-group">
                                <label for="hasil_survey_id">alamat</label>
                                <select name="hasil_survey_id" class="form-control" required>
                                    <option value="">Pilih Nama Pondok</option>
                                    @foreach ($hasilSurvey as $survey)
                                        <option value="{{ $survey->id }}">{{ $survey->calonMitra->alamat_lengkap }}</option>
                                    @endforeach
                                </select>
                            </div> --}}

                            <div class="form-group">
                                <label for="rencana_jumlah_penyaluran">{{ __('Rencana Jumlah Penyaluran') }}</label>
                                <input id="rencana_jumlah_penyaluran" type="number" class="form-control @error('rencana_jumlah_penyaluran') is-invalid @enderror" name="rencana_jumlah_penyaluran" value="{{ old('rencana_jumlah_penyaluran') }}" required autocomplete="rencana_jumlah_penyaluran">
                                @error('rencana_jumlah_penyaluran')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="cp">{{ __('Contact Person') }}</label>
                                <input id="cp" type="text" class="form-control @error('cp') is-invalid @enderror" name="cp" value="{{ old('cp') }}" required autocomplete="cp">
                                @error('cp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="cp_no_hp">{{ __('Nomor HP Contact Person') }}</label>
                                <input id="cp_no_hp" type="text" class="form-control @error('cp_no_hp') is-invalid @enderror" name="cp_no_hp" value="{{ old('cp_no_hp') }}" required autocomplete="cp_no_hp">
                                @error('cp_no_hp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <br>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Simpan') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
