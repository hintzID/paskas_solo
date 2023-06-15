@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Kondisi Pondok - Tambah Data</div>

                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <div class="card-body">
                        <form action="{{ route('kondisi_pondok.store') }}" method="POST">
                            @csrf
                            <table class="table">
                                <tr>
                                    <th>Nama Pondok</th>
                                    <td>
                                        <select name="calon_mitra_id" class="form-control" required>
                                            <option value="">Pilih Nama Pondok</option>
                                            @foreach ($calonMitras as $mitra)
                                                <option value="{{ $mitra->id }}">{{ $mitra->nama_pondok }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                @foreach ($fasilitasPondoks as $fasilitas)
                                    <tr>
                                        <th>Fasilitas Pondok</th>
                                        <td>
                                            <input type="hidden" name="fasilitas_pondok[]" value="{{ $fasilitas->id }}">
                                            {{ $fasilitas->nama_fasilitas }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Jumlah</th>
                                        <td>
                                            <input type="number" class="form-control" name="jumlah[]" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Kondisi</th>
                                        <td>
                                            <input type="text" class="form-control" name="kondisi[]" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Keterangan</th>
                                        <td>
                                            <input type="text" class="form-control" name="keterangan[]" required>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>

                            <button type="submit" class="btn btn-primary">Tambah Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
