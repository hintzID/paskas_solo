@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tambah Anak Asuh Baru</div>

                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif


                    <div class="card-body">
                        <form action="{{ route('anak_asuh.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="nama_pondok">Nama Pondok</label>
                                <select name="calon_mitra_id" id="nama_pondok" class="form-control">
                                    @foreach ($calonMitras as $calonMitra)
                                        <option value="{{ $calonMitra->id }}">{{ $calonMitra->nama_pondok }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="keterangan_anak_asuh">Keterangan Anak Asuh</label>
                                <select name="keterangan_anak_asuh_id" id="keterangan_anak_asuh" class="form-control">
                                    @foreach ($keteranganAnakAsuhs as $keteranganAnakAsuh)
                                        <option value="{{ $keteranganAnakAsuh->id }}">{{ $keteranganAnakAsuh->keterangan }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="jumlah_tk">Jumlah TK</label>
                                <input type="number" name="jumlah_tk" id="jumlah_tk" class="form-control" value="{{ old('jumlah_tk') }}">
                            </div>

                            <div class="form-group">
                                <label for="jumlah_sd">Jumlah SD</label>
                                <input type="number" name="jumlah_sd" id="jumlah_sd" class="form-control" value="{{ old('jumlah_sd') }}">
                            </div>

                            <div class="form-group">
                                <label for="jumlah_smp">Jumlah SMP</label>
                                <input type="number" name="jumlah_smp" id="jumlah_smp" class="form-control" value="{{ old('jumlah_smp') }}">
                            </div>

                            <div class="form-group">
                                <label for="jumlah_sma">Jumlah SMA</label>
                                <input type="number" name="jumlah_sma" id="jumlah_sma" class="form-control" value="{{ old('jumlah_sma') }}">
                            </div>

                            <div class="form-group">
                                <label for="jumlah_kuliah">Jumlah Kuliah</label>
                                <input type="number" name="jumlah_kuliah" id="jumlah_kuliah" class="form-control" value="{{ old('jumlah_kuliah') }}">
                            </div>

                            <br>

                            <button type="submit" class="btn btn-primary">Simpan</button> &nbsp;
                            <a href="{{ route('anak_asuh.index') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
