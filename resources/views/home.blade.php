@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                <a href="/anggota/create">Daftar Anggota</a> <br>
                <a href="/pengurus_lembaga/create">Pendataan Pengurus Lembaga</a> <br>
                <a href="/calon_mitra/create">Pendataan Pondok Calon Mitra</a> <br>
                <a href="/anak_asuh/create">Pendataan Anak Asuh</a> <br>
                <a href="/kondisi_pondok/create">Pendataan Kondisi Pondok</a> <br>
                <a href="/hasil_survey/create">Hasil Survey</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
