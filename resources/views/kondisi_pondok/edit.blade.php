@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Kondisi Pondok</div>

                    <div class="card-body">
                        <form action="{{ route('kondisi_pondok.update', $kondisiPondok->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="calon_mitra_id">Nama Pondok</label>
                                <select name="calon_mitra_id" id="calon_mitra_id" class="form-control">
                                    @foreach ($calonMitras as $calonMitra)
                                        <option value="{{ $calonMitra->id }}" {{ $calonMitra->id == $kondisiPondok->calon_mitra_id ? 'selected' : '' }}>
                                            {{ $calonMitra->nama_pondok }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="fasilitas_pondok_id">Fasilitas Pondok</label>
                                <select name="fasilitas_pondok_id" id="fasilitas_pondok_id" class="form-control">
                                    @foreach ($fasilitasPondoks as $fasilitasPondok)
                                        <option value="{{ $fasilitasPondok->id }}" {{ $fasilitasPondok->id == $kondisiPondok->fasilitas_pondok_id ? 'selected' : '' }}>
                                            {{ $fasilitasPondok->nama_fasilitas }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input type="number" name="jumlah" id="jumlah" class="form-control" value="{{ $kondisiPondok->jumlah }}">
                            </div>

                            <div class="form-group">
                                <label for="kondisi">Kondisi</label>
                                <input type="text" name="kondisi" id="kondisi" class="form-control" value="{{ $kondisiPondok->kondisi }}">
                            </div>

                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" name="keterangan" id="keterangan" class="form-control" value="{{ $kondisiPondok->keterangan }}">
                            </div>

                            <br>

                            <button type="submit" class="btn btn-primary">Simpan</button> &nbsp;
                            <a href="{{ route('kondisi_pondok.index') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
