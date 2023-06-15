@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Anak Asuh</h1>
        <form action="{{ route('anak_asuh.update', $anakAsuh->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="calon_mitra_id">Calon Mitra</label>
                <select class="form-control" id="calon_mitra_id" name="calon_mitra_id">
                    @foreach($calonMitras as $calonMitra)
                        <option value="{{ $calonMitra->id }}" {{ $calonMitra->id == $anakAsuh->calon_mitra_id ? 'selected' : '' }}>
                            {{ $calonMitra->nama_pondok }}
                        </option>
                    @endforeach
                </select>
            </div>

            
            <div class="form-group">
                <label for="keterangan_anak_asuh_id">Keterangan Anak Asuh</label>
                <select class="form-control" id="keterangan_anak_asuh_id" name="keterangan_anak_asuh_id">
                    @foreach($keteranganAnakAsuhs as $keteranganAnakAsuh)
                        <option value="{{ $keteranganAnakAsuh->id }}" {{ $keteranganAnakAsuh->id == $anakAsuh->keterangan_anak_asuh_id ? 'selected' : '' }}>
                            {{ $keteranganAnakAsuh->keterangan }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="jumlah_tk">Jumlah TK</label>
                <input type="number" class="form-control" id="jumlah_tk" name="jumlah_tk" value="{{ $anakAsuh->jumlah_tk }}">
            </div>

            <div class="form-group">
                <label for="jumlah_sd">Jumlah SD</label>
                <input type="number" class="form-control" id="jumlah_sd" name="jumlah_sd" value="{{ $anakAsuh->jumlah_sd }}">
            </div>

            <div class="form-group">
                <label for="jumlah_smp">Jumlah SMP</label>
                <input type="number" class="form-control" id="jumlah_smp" name="jumlah_smp" value="{{ $anakAsuh->jumlah_smp }}">
            </div>

            <div class="form-group">
                <label for="jumlah_sma">Jumlah SMA</label>
                <input type="number" class="form-control" id="jumlah_sma" name="jumlah_sma" value="{{ $anakAsuh->jumlah_sma }}">
            </div>

            <div class="form-group">
                <label for="jumlah_kuliah">Jumlah Kuliah</label>
                <input type="number" class="form-control" id="jumlah_kuliah" name="jumlah_kuliah" value="{{ $anakAsuh->jumlah_kuliah }}">
            </div>

            <br>

            <button type="submit" class="btn btn-primary">Simpan</button> &nbsp;
            <a href="{{ route('anak_asuh.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
