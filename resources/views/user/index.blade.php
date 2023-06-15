@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Pengguna</h1>

        <div class="mb-3">
            <form action="{{ route('user.index') }}" method="GET" class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari nama pengguna" value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
        </div>

        <div class="mb-3">
            <a href="{{ route('user.create') }}" class="btn btn-success">Tambah</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Peran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td class="d-flex gap-1">
                            <a href="{{ route('user.show', $user->id) }}" class="btn btn-info">Detail</a>
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary{{ $user->role === 'admin' ? ' disabled' : '' }}"{{ $user->role === 'admin' ? ' disabled' : '' }}>Edit</a>
                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')"{{ $user->role === 'admin' ? ' disabled' : '' }}>Hapus</button>
                            </form>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
