@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Daftar Hasil Survey</div>

                    <div class="card-body">
                        <div class="mb-3">
                            <form action="{{ route('hasil_survey.index') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="keyword" placeholder="Cari nama pondok...">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Cari</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pondok</th>
                                    <th>Tingkat Layak</th>
                                    <th>Prioritas</th>
                                    <th>Verifikasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($hasilSurveys as $hasilSurvey)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $hasilSurvey->calonMitra->nama_pondok }}</td>
                                        <td>{{ $hasilSurvey->tingkat_layak }}</td>
                                        <td>{{ $hasilSurvey->prioritas }}</td>
                                        <td>{{ $hasilSurvey->verifikasi? 'terverifiaksi':'belum terverifikasi'}}</td>
                                        <td class="d-flex gap-1">
                                            <a href="{{ route('hasil_survey.show', $hasilSurvey->id) }}" class="btn btn-info btn-sm">Detail</a>
                                            <a href="{{ route('hasil_survey.edit', $hasilSurvey->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ route('hasil_survey.destroy', $hasilSurvey->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        {{ $hasilSurveys->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
