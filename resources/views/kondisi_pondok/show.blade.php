@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detail Kondisi Pondok</h1>
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>Nama Pondok</th>
                        <td>{{ $kondisiPondok->calonMitra->nama_pondok }}</td>
                    </tr>
                    <tr>
                        <th>Fasilitas Pondok</th>
                        <td>{{ $kondisiPondok->fasilitasPondok->nama_fasilitas }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah</th>
                        <td>{{ $kondisiPondok->jumlah }}</td>
                    </tr>
                    <tr>
                        <th>Kondisi</th>
                        <td>{{ $kondisiPondok->kondisi }}</td>
                    </tr>
                    <tr>
                        <th>Keterangan</th>
                        <td>{{ $kondisiPondok->keterangan }}</td>
                    </tr>
                </table>
                <p class="card-text">Created at: {{ $kondisiPondok->created_at }}</p>
                <p class="card-text">Updated at: {{ $kondisiPondok->updated_at }}</p>
            </div>
        </div>
        <a href="{{ route('kondisi_pondok.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
@endsection
