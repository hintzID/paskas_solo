@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Detail Pengurus Lembaga</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama">Nama:</label>
                            <input type="text" class="form-control" value="{{ $pengurusLembaga->nama }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="profesi">Profesi:</label>
                            <input type="text" class="form-control" value="{{ $pengurusLembaga->profesi }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat:</label>
                            <input type="text" class="form-control" value="{{ $pengurusLembaga->alamat }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="no_hp">No. HP:</label>
                            <input type="text" class="form-control" value="{{ $pengurusLembaga->no_hp }}" readonly>
                        </div>

                        <br>

                        <a href="{{ route('pengurus_lembaga.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
