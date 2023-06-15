@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tambah Anggota</div>

                    <div class="card-body">
                        <form action="{{ route('anggota.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nama_lengkap">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" value="{{ old('nama_lengkap') }}" required>
                                @error('nama_lengkap')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="kota_tempat_lahir">Kota Tempat Lahir</label>
                                <input type="text" name="kota_tempat_lahir" id="kota_tempat_lahir" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="alamat_lengkap">Alamat Lengkap</label>
                                <textarea name="alamat_lengkap" id="alamat_lengkap" class="form-control"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="menikah">Menikah</option>
                                    <option value="belum_menikah">Belum Menikah</option>
                                    <option value="janda">Janda</option>
                                    <option value="duda">Duda</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="pekerjaan">Pekerjaan</label>
                                <input type="text" name="pekerjaan" id="pekerjaan" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="no_telepon">Nomor Telepon</label>
                                <input type="text" name="no_telepon" id="no_telepon" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="pilihan_kontribusi">Pilihan Kontribusi</label>
                                <select name="pilihan_kontribusi" id="pilihan_kontribusi" class="form-control">
                                    <option value="cs">Customer Service</option>
                                    <option value="mkp">Marketing & Promotion</option>
                                    <option value="keuangan">Keuangan</option>
                                    <option value="fundraising">Fundraising</option>
                                    <option value="sdm">SDM (Sumber Daya Manusia)</option>
                                    <option value="support">Support</option>
                                    <option value="distributor">Distributor</option>
                                </select>
                            </div>

                            <br>

                            <button type="submit" class="btn btn-primary">Simpan</button> &nbsp;
                            <a href="{{ route('anggota.index') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
