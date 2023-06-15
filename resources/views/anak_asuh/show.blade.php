@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detail Anak Asuh</h1>
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Calon Mitra:</th>
                            <td>{{ $anakAsuh->calonMitra->nama_pondok }}</td>
                        </tr>
                        <tr>
                            <th>Keterangan Anak Asuh:</th>
                            <td>{{ $anakAsuh->keteranganAnakAsuh->keterangan }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah TK:</th>
                            <td>{{ $anakAsuh->jumlah_tk }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah SD:</th>
                            <td>{{ $anakAsuh->jumlah_sd }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah SMP:</th>
                            <td>{{ $anakAsuh->jumlah_smp }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah SMA:</th>
                            <td>{{ $anakAsuh->jumlah_sma }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah Kuliah:</th>
                            <td>{{ $anakAsuh->jumlah_kuliah }}</td>
                        </tr>
                    </tbody>
                </table>
                <p class="card-text">Created at: {{ $anakAsuh->created_at }}</p>
                <p class="card-text">Updated at: {{ $anakAsuh->updated_at }}</p>
            </div>
        </div>
        <a href="{{ route('anak_asuh.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
@endsection
