<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'nama_lengkap',
        'jenis_kelamin',
        'kota_tempat_lahir',
        'tanggal_lahir',
        'alamat_lengkap',
        'status',
        'pekerjaan',
        'no_telepon',
        'verifikasi',
        'pilihan_kontribusi',
    ];

    protected $casts = [
        'verifikasi' => 'boolean',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'email', 'email');
    }
}
