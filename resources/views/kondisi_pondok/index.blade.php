@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Kondisi Pondok</div>

                    <div class="card-body">
                        <div class="mb-3">
                            <form action="{{ route('kondisi_pondok.index') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="keyword" placeholder="Cari fasilitas pondok...">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Cari</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pondok</th>
                                    <th>Fasilitas Pondok</th>
                                    <th>Jumlah</th>
                                    <th>Kondisi</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $namaPondok = '';
                                @endphp
                                @forelse ($kondisiPondoks as $kondisiPondok)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if ($kondisiPondok->CalonMitra->nama_pondok != $namaPondok)
                                                {{ $kondisiPondok->CalonMitra->nama_pondok }}
                                                @php
                                                    $namaPondok = $kondisiPondok->CalonMitra->nama_pondok;
                                                @endphp
                                            @endif
                                        </td>
                                        <td>{{ $kondisiPondok->fasilitasPondok->nama_fasilitas }}</td>
                                        <td>{{ $kondisiPondok->jumlah }}</td>
                                        <td>{{ $kondisiPondok->kondisi }}</td>
                                        <td>{{ $kondisiPondok->keterangan }}</td>
                                        <td class="d-flex gap-1">
                                            <a href="{{ route('kondisi_pondok.show', $kondisiPondok->id) }}" class="btn btn-info btn-sm">Detail</a>
                                            <a href="{{ route('kondisi_pondok.edit', $kondisiPondok->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ route('kondisi_pondok.destroy', $kondisiPondok->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        {{ $kondisiPondoks->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
