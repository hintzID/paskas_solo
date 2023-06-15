@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Daftar Trip</h4>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('trip.create') }}" class="btn btn-primary mb-3">Tambah Trip</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Trip</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($trips as $trip)
                                    <tr>
                                        <td>{{ $trip->id }}</td>
                                        <td>{{ $trip->nama_trip }}</td>
                                        <td>{{ $trip->keterangan }}</td>
                                        <td>
                                            <a href="{{ route('trip.edit', $trip->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('trip.destroy', $trip->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus trip ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
