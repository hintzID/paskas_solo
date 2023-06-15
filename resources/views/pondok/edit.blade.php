@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Pondok') }}</div>

                    <div class="card-body">
                        <form action="{{ route('pondok.update', $pondok->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="hasil_survey_id">Nama Pondok</label>
                                <select id="hasil_survey_id" class="form-control @error('hasil_survey_id') is-invalid @enderror" name="hasil_survey_id" required>
                                    <option value="">Pilih Nama Pondok</option>
                                    @foreach ($hasilSurvey as $survey)
                                        <option value="{{ $survey->id }}" {{ $survey->id == old('hasil_survey_id', $pondok->hasil_survey_id) ? 'selected' : '' }}>
                                            {{ $survey->calonMitra->nama_pondok }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('hasil_survey_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="rencana_jumlah_penyaluran">{{ __('Rencana Jumlah Penyaluran') }}</label>
                                <input id="rencana_jumlah_penyaluran" type="number" class="form-control @error('rencana_jumlah_penyaluran') is-invalid @enderror" name="rencana_jumlah_penyaluran" value="{{ old('rencana_jumlah_penyaluran', $pondok->rencana_jumlah_penyaluran) }}" required>
                                @error('rencana_jumlah_penyaluran')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="cp">{{ __('Contact Person') }}</label>
                                <input id="cp" type="text" class="form-control @error('cp') is-invalid @enderror" name="cp" value="{{ old('cp', $pondok->cp) }}" required>
                                @error('cp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="cp_no_hp">{{ __('Nomor HP Contact Person') }}</label>
                                <input id="cp_no_hp" type="text" class="form-control @error('cp_no_hp') is-invalid @enderror" name="cp_no_hp" value="{{ old('cp_no_hp', $pondok->cp_no_hp) }}" required>
                                @error('cp_no_hp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <br>

                            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
