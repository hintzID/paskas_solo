<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnakAsuh extends Model
{
    protected $table = 'anak_asuh';

    protected $fillable = [
        'jumlah_tk',
        'jumlah_sd',
        'jumlah_smp',
        'jumlah_sma',
        'jumlah_kuliah',
        'keterangan_anak_asuh_id',
        'calon_mitra_id',
    ];

    public function keteranganAnakAsuh()
    {
        return $this->belongsTo(KeteranganAnakAsuh::class);
    }

    public function calonMitra()
    {
        return $this->belongsTo(CalonMitra::class);
    }
}
