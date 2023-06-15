@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Keterangan Anak Asuh</div>

                    <div class="card-body">
                        <a href="{{ route('keterangan_anak_asuh.create') }}" class="btn btn-primary mb-3">Tambah Keterangan</a>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($keteranganAnakAsuh as $key => $keterangan)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $keterangan->keterangan }}</td>
                                        <td>
                                            {{-- <a href="{{ route('keterangan_anak_asuh.show', $keterangan->id) }}" class="btn btn-sm btn-primary">Detail</a>
                                            <a href="{{ route('keterangan_anak_asuh.edit', $keterangan->id) }}" class="btn btn-sm btn-success">Edit</a> --}}
                                            <form action="{{ route('keterangan_anak_asuh.destroy', $keterangan->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus keterangan ini?')">Hapus</button>
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
