<!-- index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3>Daftar Trip Penyaluran Donasi</h3>
                            <a href="{{ route('trip_penyaluran_donasi.create') }}" class="btn btn-primary">Tambah Trip Penyaluran Donasi</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('trip_penyaluran_donasi.index') }}" method="GET">
                            <div class="input-group mb-3">
                                <input type="text" name="search" class="form-control" placeholder="Cari nama trip">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                                </div>
                            </div>
                        </form>
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th rowspan="2" style="vertical-align: middle;">No</th>
                                    <th rowspan="2" style="vertical-align: middle;">Nama Trip</th>
                                    <th rowspan="2" style="vertical-align: middle;">Urutan</th>
                                    <th rowspan="2" style="vertical-align: middle;">Nama Pondok</th>
                                    <th rowspan="2" style="vertical-align: middle;">Alamat</th>
                                    <th colspan="2" style="vertical-align: middle;">Rencana Donasi</th>
                                    <th colspan="2" style="vertical-align: middle;">Contact Person</th>
                                    <th rowspan="2" style="vertical-align: middle;">Aksi</th>
                                </tr>
                                <tr>
                                    <th style="vertical-align: middle;">KG</th>
                                    <th style="vertical-align: middle;">SAK</th>  
                                    <th style="vertical-align: middle;">Contact Person</th>
                                    <th style="vertical-align: middle;">No. HP</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($donations as $donation)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $donation->trip->nama_trip }}</td>
                                        <td>{{ $donation->trip->keterangan }}</td>
                                        <td>{{ $donation->pondok->hasilSurvey->calonMitra->nama_pondok}}</td>
                                        <td>{{ $donation->pondok->hasilSurvey->calonMitra->alamat_lengkap}}</td>
                                        <td>{{ $donation->pondok->rencana_jumlah_penyaluran  *20}}</td>
                                        <td>{{ $donation->pondok->rencana_jumlah_penyaluran}}</td>
                                        <td class="align-middle">{{ $donation->pondok->cp}}</td>
                                        <td class="align-middle">{{ $donation->pondok->cp_no_hp}}</td>
                                        <td>
                                            <div class="d-flex gap-1 justify-content-center">
                                                <a href="{{ route('trip_penyaluran_donasi.show', $donation->id) }}" class="btn btn-info btn-sm mr-2">Detail</a>
                                                <a href="{{ route('trip_penyaluran_donasi.edit', $donation->id) }}" class="btn btn-primary btn-sm mr-2">Edit</a>
                                                <form action="{{ route('trip_penyaluran_donasi.destroy', $donation->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $donations->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
