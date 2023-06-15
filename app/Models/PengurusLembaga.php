<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengurusLembaga extends Model
{
    use HasFactory;

    protected $table = 'pengurus_lembaga';

    protected $fillable = [
        'nama',
        'profesi',
        'alamat',
        'no_hp',
    ];
}
