@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Anggota</div>

                    <div class="card-body">
                        <form action="{{ route('anggota.update', $anggota->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $anggota->email) }}" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nama_lengkap">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" value="{{ old('nama_lengkap', $anggota->nama_lengkap) }}" required>
                                @error('nama_lengkap')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="Laki-laki" {{ old('jenis_kelamin', $anggota->jenis_kelamin) === 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ old('jenis_kelamin', $anggota->jenis_kelamin) === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="kota_tempat_lahir">Kota Tempat Lahir</label>
                                <input type="text" name="kota_tempat_lahir" id="kota_tempat_lahir" class="form-control @error('kota_tempat_lahir') is-invalid @enderror" value="{{ old('kota_tempat_lahir', $anggota->kota_tempat_lahir) }}">
                                @error('kota_tempat_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{ old('tanggal_lahir', $anggota->tanggal_lahir) }}">
                                @error('tanggal_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="alamat_lengkap">Alamat Lengkap</label>
                                <textarea name="alamat_lengkap" id="alamat_lengkap" class="form-control @error('alamat_lengkap') is-invalid @enderror">{{ old('alamat_lengkap', $anggota->alamat_lengkap) }}</textarea>
                                @error('alamat_lengkap')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                    <option value="">-- Pilih Status --</option>
                                    <option value="menikah" {{ old('status', $anggota->status) === 'menikah' ? 'selected' : '' }}>Menikah</option>
                                    <option value="belum_menikah" {{ old('status', $anggota->status) === 'belum_menikah' ? 'selected' : '' }}>Belum Menikah</option>
                                    <option value="janda" {{ old('status', $anggota->status) === 'janda' ? 'selected' : '' }}>Janda</option>
                                    <option value="duda" {{ old('status', $anggota->status) === 'duda' ? 'selected' : '' }}>Duda</option>
                                </select>
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="pekerjaan">Pekerjaan</label>
                                <input type="text" name="pekerjaan" id="pekerjaan" class="form-control @error('pekerjaan') is-invalid @enderror" value="{{ old('pekerjaan', $anggota->pekerjaan) }}">
                                @error('pekerjaan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="no_telepon">Nomor Telepon</label>
                                <input type="text" name="no_telepon" id="no_telepon" class="form-control @error('no_telepon') is-invalid @enderror" value="{{ old('no_telepon', $anggota->no_telepon) }}">
                                @error('no_telepon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input type="checkbox" name="verifikasi" id="verifikasi" class="form-check-input" {{ old('verifikasi', $anggota->verifikasi) ? 'checked' : '' }}>
                                    <label for="verifikasi" class="form-check-label">Verifikasi</label>
                                </div>
                                @error('verifikasi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="pilihan_kontribusi">Pilihan Kontribusi</label>
                                <select name="pilihan_kontribusi" id="pilihan_kontribusi" class="form-control @error('pilihan_kontribusi') is-invalid @enderror">
                                    <option value="">-- Pilih Pilihan Kontribusi --</option>
                                    <option value="cs" {{ old('pilihan_kontribusi', $anggota->pilihan_kontribusi) === 'cs' ? 'selected' : '' }}>Customer Service</option>
                                    <option value="mkp" {{ old('pilihan_kontribusi', $anggota->pilihan_kontribusi) === 'mkp' ? 'selected' : '' }}>Marketing and Promotions</option>
                                    <option value="keuangan" {{ old('pilihan_kontribusi', $anggota->pilihan_kontribusi) === 'keuangan' ? 'selected' : '' }}>Keuangan</option>
                                    <option value="fundraising" {{ old('pilihan_kontribusi', $anggota->pilihan_kontribusi) === 'fundraising' ? 'selected' : '' }}>Fundraising</option>
                                    <option value="sdm" {{ old('pilihan_kontribusi', $anggota->pilihan_kontribusi) === 'sdm' ? 'selected' : '' }}>SDM (Sumber Daya Manusia)</option>
                                    <option value="support" {{ old('pilihan_kontribusi', $anggota->pilihan_kontribusi) === 'support' ? 'selected' : '' }}>Support</option>
                                    <option value="distributor" {{ old('pilihan_kontribusi', $anggota->pilihan_kontribusi) === 'distributor' ? 'selected' : '' }}>Distributor</option>
                                </select>
                                @error('pilihan_kontribusi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
