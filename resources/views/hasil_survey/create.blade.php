@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <div class="card-header">Tambah Hasil Survey</div>

                
                    <div class="card-body">
                        <form action="{{ route('hasil_survey.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="calon_mitra_id">Nama Pondok</label>
                                <select name="calon_mitra_id" class="form-control" required>
                                    <option value="">Pilih Nama Pondok</option>
                                    @foreach ($calonMitras as $calonMitra)
                                        <option value="{{ $calonMitra->id }}">{{ $calonMitra->nama_pondok }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tingkat_layak">Tingkat Kelayakan</label>
                                <select name="tingkat_layak" class="form-control" required>
                                    <option value="">Pilih Tingkat Kelayakan</option>
                                    <option value="layak">Layak</option>
                                    <option value="belum">Belum Layak</option>
                                    <option value="tidak">Tidak Layak</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="prioritas">Prioritas</label>
                                <select name="prioritas" class="form-control" required>
                                    <option value="">Pilih Prioritas</option>
                                    <option value="mendesak">Mendesak</option>
                                    <option value="tidak">Tidak Mendesak</option>
                                </select>
                            </div>

                            <br>
                            
                            <button type="submit" class="btn btn-primary">Tambah Hasil Survey</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
