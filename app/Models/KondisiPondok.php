<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KondisiPondok extends Model
{
    use HasFactory;

    protected $table = 'kondisi_pondok';
    protected $fillable = [
        'fasilitas_pondok_id',
        'calon_mitra_id',
        'jumlah',
        'kondisi',
        'keterangan',
    ];

    public function fasilitasPondok()
    {
        return $this->belongsTo(FasilitasPondok::class, 'fasilitas_pondok_id');
    }

    public function calonMitra()
    {
        return $this->belongsTo(CalonMitra::class, 'calon_mitra_id');
    }
}
