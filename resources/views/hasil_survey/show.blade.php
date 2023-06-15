@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detail Hasil Survey</h1>
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>Nama Pondok</th>
                        <td>{{ $hasilSurvey->calonMitra->nama_pondok }}</td>
                    </tr>
                    <tr>
                        <th>Tingkat Layak</th>
                        <td>{{ $hasilSurvey->tingkat_layak }}</td>
                    </tr>
                    <tr>
                        <th>Prioritas</th>
                        <td>{{ $hasilSurvey->prioritas }}</td>
                    </tr>
                    <tr>
                        <th>Verifikasi</th>
                        <td>{{ $hasilSurvey->verifikasi? 'terverifikasi' : 'belum terverifikasi' }}</td>
                    </tr>
                </table>
                <p class="card-text">Created at: {{ $hasilSurvey->created_at }}</p>
                <p class="card-text">Updated at: {{ $hasilSurvey->updated_at }}</p>
            </div>
        </div>
        <a href="{{ route('hasil_survey.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
@endsection
