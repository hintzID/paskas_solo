<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripPenyaluranDonasi extends Model
{
    use HasFactory;

    protected $table = 'trip_penyaluran_donasi';

    protected $fillable = [
        'trip_id',
        'pondok_id',
        'donasi_masuk_id',
    ];

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function pondok()
    {
        return $this->belongsTo(Pondok::class);
    }

    public function donasiMasuk()
    {
        return $this->belongsTo(DonasiMasuk::class);
    }
}
