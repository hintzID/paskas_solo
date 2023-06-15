@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Detail Anggota</div>

                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Email</th>
                                <td>{{ $anggota->email }}</td>
                            </tr>
                            <tr>
                                <th>Nama Lengkap</th>
                                <td>{{ $anggota->nama_lengkap }}</td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td>{{ $anggota->jenis_kelamin }}</td>
                            </tr>
                            <tr>
                                <th>Kota Tempat Lahir</th>
                                <td>{{ $anggota->kota_tempat_lahir }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td>{{ $anggota->tanggal_lahir }}</td>
                            </tr>
                            <tr>
                                <th>Alamat Lengkap</th>
                                <td>{{ $anggota->alamat_lengkap }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{ str_replace('_', ' ', $anggota->status) }}</td>
                            </tr>
                            <tr>
                                <th>Pekerjaan</th>
                                <td>{{ $anggota->pekerjaan }}</td>
                            </tr>
                            <tr>
                                <th>No. Telepon</th>
                                <td>{{ $anggota->no_telepon }}</td>
                            </tr>
                            <tr>
                                <th>Verifikasi</th>
                                <td>{{ $anggota->verifikasi ? 'Terverifikasi' : 'Belum Terverifikasi' }}</td>
                            </tr>
                            <tr>
                                <th>Pilihan Kontribusi</th>
                                <td>
                                    @if ($anggota->pilihan_kontribusi === 'cs')
                                        Customer Service
                                    @elseif ($anggota->pilihan_kontribusi === 'mkp')
                                        Marketing and Promotions
                                    @elseif ($anggota->pilihan_kontribusi === 'keuangan')
                                        Keuangan
                                    @elseif ($anggota->pilihan_kontribusi === 'fundraising')
                                        Fundraising
                                    @elseif ($anggota->pilihan_kontribusi === 'sdm')
                                        SDM (Sumber Daya Manusia)
                                    @elseif ($anggota->pilihan_kontribusi === 'support')
                                        Support
                                    @elseif ($anggota->pilihan_kontribusi === 'distributor')
                                        Distributor
                                    @endif
                                </td>
                            </tr>
                            
                        </table>

                        <a href="{{ route('anggota.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
