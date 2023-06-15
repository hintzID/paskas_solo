@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah Trip</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('trip.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nama_trip">Nama Trip</label>
                                <input type="text" name="nama_trip" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea name="keterangan" class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
