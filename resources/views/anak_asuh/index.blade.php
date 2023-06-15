@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Daftar Anak Asuh</div>
                    @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="card-body">
                        <form action="{{ route('anak_asuh.index') }}" method="GET" class="mb-3">
                            <div class="input-group">
                                <input type="text" name="keyword" class="form-control" placeholder="Cari berdasarkan Nama Pondok" value="{{ $keyword }}">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                                </div>
                            </div>
                        </form>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Pondok</th>
                                    <th>Keterangan</th>
                                    <th>Jumlah TK</th>
                                    <th>Jumlah SD</th>
                                    <th>Jumlah SMP</th>
                                    <th>Jumlah SMA</th>
                                    <th>Jumlah Kuliah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($anakAsuhs as $anakAsuh)
                                    <tr>
                                        <td>{{ $anakAsuh->id }}</td>
                                        <td>{{ $anakAsuh->calonMitra->nama_pondok }}</td>
                                        <td>{{ $anakAsuh->keteranganAnakAsuh->keterangan }}</td>
                                        <td>{{ $anakAsuh->jumlah_tk }}</td>
                                        <td>{{ $anakAsuh->jumlah_sd }}</td>
                                        <td>{{ $anakAsuh->jumlah_smp }}</td>
                                        <td>{{ $anakAsuh->jumlah_sma }}</td>
                                        <td>{{ $anakAsuh->jumlah_kuliah }}</td>
                                        <td class="d-flex gap-1">
                                            <a href="{{ route('anak_asuh.show', $anakAsuh->id) }}" class="btn btn-primary btn-sm">Detail</a>
                                            <a href="{{ route('anak_asuh.edit', $anakAsuh->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('anak_asuh.destroy', $anakAsuh->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $anakAsuhs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
