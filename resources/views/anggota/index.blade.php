@extends('layouts.app')

@section('content')
    <div class="container">

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Daftar Anggota</div>

                    <div class="card-body">
                        <form action="{{ route('anggota.index') }}" method="GET" class="mb-3">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Cari Anggota" value="{{ $search }}">
                                <button type="submit" class="btn btn-primary">Cari</button>
                            </div>
                        </form>
                        <a href="{{ route('anggota.create') }}" class="btn btn-success mb-3">Tambah</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($anggotas as $key => $anggota)
                                    <tr>
                                        <td>{{ $anggotas->firstItem() + $key }}</td>
                                        <td>{{ $anggota->nama_lengkap }}</td>
                                        <td>{{ $anggota->email }}</td>                                 
                                        <td>{{ $anggota->verifikasi ? 'Terverifikasi' : 'Belum Terverifikasi' }}</td>
                                        <td class="d-flex gap-2">
                                            <a href="{{ route('anggota.show', $anggota) }}" class="btn btn-primary btn-sm">Detail</a>
                                            <a href="{{ route('anggota.edit', $anggota) }}" class="btn btn-info btn-sm">Edit</a>
                                            <form action="{{ route('anggota.destroy', $anggota) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus anggota ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $anggotas->appends(['search' => $search])->links() }}
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
