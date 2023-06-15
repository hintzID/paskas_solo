@extends('layouts.app')

@section('content')
    <h1>Daftar Donasi Masuk</h1>

    <a href="{{ route('donasi_masuk.create') }}" class="btn btn-primary mb-3">Tambah Donasi Masuk</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Donasi yang Masuk</th>
                <th>Total Donasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($donasiMasuk as $donasi)
                <tr>
                    <td>{{ $donasi->id }}</td>
                    <td>{{ $donasi->donasi_yang_masuk }}</td>
                    <td>{{ $donasi->total_donasi }}</td>
                    <td>
                        <a href="{{ route('donasi_masuk.edit', $donasi->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('donasi_masuk.destroy', $donasi->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus donasi masuk ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
