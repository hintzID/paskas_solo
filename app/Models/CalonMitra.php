<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalonMitra extends Model
{
    use HasFactory;

    protected $table = 'calon_mitra';
    
    protected $fillable = [
        'nama_pondok',
        'tanggal_berdiri',
        'alamat_lengkap',
        'pengurus_lembaga_id',
        'sumber_dana_operasional',
        'jumlah_pengurus_menetap',
        'jumlah_pengurus_tidak_menetap',
    ];
    
    public function pengurusLembaga()
    {
        return $this->belongsTo(PengurusLembaga::class, 'pengurus_lembaga_id');
    }
}
