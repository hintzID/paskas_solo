<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeteranganAnakAsuh extends Model
{
    use HasFactory;

    protected $table = 'keterangan_anak_asuh';

    protected $fillable = [
        'keterangan',
    ];
}
