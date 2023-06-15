@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Daftar Pondok') }}</div>

                    <div class="card-body">
                        <form action="{{ route('pondok.index') }}" method="GET" class="mb-3">
                            <div class="input-group">
                                <input type="text" name="keyword" class="form-control" placeholder="Cari nama pondok atau alamat" value="{{ request('keyword') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                </div>
                            </div>
                        </form>
                        
                        <div class="mb-3">
                            <a href="{{ route('pondok.create') }}" class="btn btn-success">Tambah</a>
                        </div>

                        <table class="table table-bordered text-center">
                            <thead class="">
                                <tr>
                                    <th scope="col" rowspan="2" style="vertical-align: middle;">Nama Pondok</th>
                                    <th scope="col" rowspan="2" style="vertical-align: middle;">Alamat</th>
                                    <th scope="col" colspan="2" style="">Rencana Jumlah Penyaluran</th>
                                    <th scope="col" colspan="2" style="text-align:center;">Contact Person</th>
                                    <th scope="col" rowspan="2" style="vertical-align: middle;" class="">Aksi</th>
                                </tr>
                                <tr>
                                    <th scope="col">SAK</th>
                                    <th scope="col">KG</th>
                                    <th scope="col">Nama Ustadz</th>
                                    <th scope="col">Nomor HP</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @forelse ($pondoks as $pondok)
                                    <tr>
                                        <td>{{ $pondok->hasilSurvey->calonMitra->nama_pondok }}</td>
                                        <td>{{ $pondok->hasilSurvey->calonMitra->alamat_lengkap }}</td>
                                        <td>{{ $pondok->rencana_jumlah_penyaluran }}</td>
                                        <td>{{ $pondok->rencana_jumlah_penyaluran * 20}}</td>
                                        <td>{{ $pondok->cp }}</td>
                                        <td>
                                            @php
                                                $phoneNumber = $pondok->cp_no_hp;
                                                $formattedPhoneNumber = substr($phoneNumber, 0, 4) . '-' . substr($phoneNumber, 4, 4) . '-' . substr($phoneNumber, 8, 4);
                                            @endphp
                                            {{ $formattedPhoneNumber }}
                                        </td>
                                        
                                        <td class="d-flex gap-1 justify-content-center">
                                            <a href="{{ route('pondok.show', $pondok->id) }}" class="btn btn-sm btn-info">Detail</a>
                                            <a href="{{ route('pondok.edit', $pondok->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('pondok.destroy', $pondok->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus data pondok ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada data pondok.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        {{ $pondoks->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
