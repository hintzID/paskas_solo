<!-- edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Trip Penyaluran Donasi</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('trip_penyaluran_donasi.update', $donation->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="trip_id">Trip</label>
                                <select name="trip_id" class="form-control" required>
                                    <option value="">Pilih Trip</option>
                                    @foreach($trips as $trip)
                                        <option value="{{ $trip->id }}" {{ $trip->id == $donation->trip_id ? 'selected' : '' }}>{{ $trip->nama_trip }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pondok_id">Pondok</label>
                                <select name="pondok_id" class="form-control" required>
                                    <option value="">Pilih Pondok</option>
                                    @foreach($pondoks as $pondok)
                                        <option value="{{ $pondok->id }}" {{ $pondok->id == $donation->pondok_id ? 'selected' : '' }}>{{ $pondok->hasilSurvey->calonMitra->nama_pondok}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="donasi_masuk_id">Donasi Masuk</label>
                                <select name="donasi_masuk_id" class="form-control" required>
                                    <option value="">Pilih Donasi Masuk</option>
                                    @foreach($donasiMasuks as $donasiMasuk)
                                        <option value="{{ $donasiMasuk->id }}" {{ $donasiMasuk->id == $donation->donasi_masuk_id ? 'selected' : '' }}>{{ $donasiMasuk->donasi_yang_masuk }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
