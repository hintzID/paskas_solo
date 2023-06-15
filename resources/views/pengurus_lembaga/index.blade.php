@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Daftar Pengurus Lembaga</div>
                    @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <div class="card-body">
                        <form action="{{ route('pengurus_lembaga.index') }}" method="GET" class="mb-3">
                            <div class="input-group">
                                <input type="text" name="keyword" class="form-control" placeholder="Cari berdasarkan Nama, Profesi, atau Alamat" value="{{ $keyword }}">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                                </div>
                            </div>
                        </form>

                        <a href="{{ route('pengurus_lembaga.create') }}" class="btn btn-primary mb-3">Tambah Pengurus Lembaga</a>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Profesi</th>
                                    <th>Alamat</th>
                                    <th>No. HP</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengurusLembagas as $pengurusLembaga)
                                    <tr>
                                        <td>{{ $pengurusLembaga->id }}</td>
                                        <td>{{ $pengurusLembaga->nama }}</td>
                                        <td>{{ $pengurusLembaga->profesi }}</td>
                                        <td>{{ $pengurusLembaga->alamat }}</td>
                                        <td>{{ $pengurusLembaga->no_hp }}</td>
                                        <td class="d-flex gap-1">
                                            <a href="{{ route('pengurus_lembaga.show', $pengurusLembaga->id) }}" class="btn btn-info btn-sm">Detail</a>
                                            <a href="{{ route('pengurus_lembaga.edit', $pengurusLembaga->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ route('pengurus_lembaga.destroy', $pengurusLembaga->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $pengurusLembagas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
