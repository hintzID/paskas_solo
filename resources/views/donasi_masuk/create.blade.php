@extends('layouts.app')

@section('content')
    <h1>Tambah Donasi Masuk</h1>

    <form action="{{ route('donasi_masuk.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="donasi_yang_masuk">Donasi yang Masuk</label>
            <input type="number" name="donasi_yang_masuk" id="donasi_yang_masuk" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="total_donasi">Total Donasi</label>
            <input type="number" name="total_donasi" id="total_donasi" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('donasi_masuk.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
