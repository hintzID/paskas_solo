<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FasilitasPondok extends Model
{
    use HasFactory;

    protected $table = 'fasilitas_pondok';

    protected $fillable = ['nama_fasilitas'];
}
