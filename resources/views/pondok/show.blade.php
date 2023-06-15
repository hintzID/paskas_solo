@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Detail Pondok') }}</div>

                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="row"> Nama Pondok </th>
                                    <td>{{ $pondok->hasilSurvey->calonMitra->nama_pondok }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Rencana Jumlah Penyaluran </th>
                                    <td>{{ $pondok->rencana_jumlah_penyaluran }} <b>SAK</b></td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('Contact Person') }}</th>
                                    <td>{{ $pondok->cp }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">{{ __('Nomor HP Contact Person') }}</th>
                                    <td>{{ $pondok->cp_no_hp }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
