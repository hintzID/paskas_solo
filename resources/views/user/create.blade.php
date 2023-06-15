<!-- resources/views/user/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create User</h1>
        <form action="{{ route('user.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <select name="name" id="name" class="form-control" required>
                    <option value="">Pilih Nama</option>
                    @foreach ($anggotas as $anggota)
                        <option value="{{ $anggota->nama_lengkap }}">
                            {{ $anggota->nama_lengkap }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <select name="email" id="email" class="form-control @error('email') is-invalid @enderror" required>
                    <option value="">Pilih Email</option>
                    @foreach ($anggotas as $anggota)
                        @php
                            $emailExists = \App\Models\User::whereHas('anggota', function ($query) use ($anggota) {
                                $query->where('email', $anggota->email);
                            })->exists();
                        @endphp
                        <option value="{{ $anggota->email }}" {{ $emailExists ? 'hidden' : '' }}>
                            {{ $anggota->email }}
                        </option>
                    @endforeach
                </select>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="role">Role</label>
                <select name="role" id="role" class="form-control" required>
                    <option value="member">Member</option>
                    <option value="admin">Admin</option>
                </select>
            </div>

            <br>

            <button type="submit" class="btn btn-primary">Create User</button>
        </form>
    </div>
@endsection
