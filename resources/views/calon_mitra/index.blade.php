@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Daftar Calon Mitra</div>
                    @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="card-body">       
                        <form action="{{ route('calon_mitra.index') }}" method="GET" class="mb-3">
                            <div class="input-group">
                                <input type="text" name="keyword" class="form-control" placeholder="Cari berdasarkan Nama Pondok atau Alamat Lengkap" value="{{ $keyword }}">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                                </div>
                            </div>
                        </form>
<a href="{{ route('calon_mitra.create') }}" class="btn btn-primary mb-3">Create</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Pondok</th>
                                    <th>Tanggal Berdiri</th>
                                    <th>Alamat Lengkap</th>
                                    <th>Pengurus Lembaga</th>
                                    <th>Sumber Dana</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($calonMitra as $mitra)
                                    <tr>
                                        <td>{{ $mitra->id }}</td>
                                        <td>{{ $mitra->nama_pondok }}</td>
                                        <td>{{ $mitra->tanggal_berdiri }}</td>
                                        <td>{{ $mitra->alamat_lengkap }}</td>
                                        <td>{{ $mitra->pengurusLembaga->nama }}</td>
                                        <td>{{ $mitra->sumber_dana_operasional }}</td>
                                        <td class="d-flex gap-1">
                                            <a href="{{ route('calon_mitra.show', $mitra->id) }}" class="btn btn-sm btn-primary">Lihat</a>
                                            <a href="{{ route('calon_mitra.edit', $mitra->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('calon_mitra.destroy', $mitra->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus calon mitra ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $calonMitra->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
