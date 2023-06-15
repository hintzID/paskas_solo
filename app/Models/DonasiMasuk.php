<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonasiMasuk extends Model
{
    use HasFactory;

    protected $table = 'donasi_masuk';

    protected $fillable = [
        'donasi_yang_masuk',
        'total_donasi',
    ];
}
