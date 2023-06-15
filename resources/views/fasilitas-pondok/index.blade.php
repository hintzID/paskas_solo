<!-- resources/views/fasilitas-pondok/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Fasilitas Pondok</h1>
        <a href="{{ route('fasilitas-pondok.create') }}" class="btn btn-primary mb-3">Tambah Fasilitas Pondok</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Fasilitas</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fasilitasPondok as $fasilitas)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $fasilitas->nama_fasilitas }}</td>
                        <td>
                            <a href="{{ route('fasilitas-pondok.edit', $fasilitas->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('fasilitas-pondok.destroy', $fasilitas->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus fasilitas ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
