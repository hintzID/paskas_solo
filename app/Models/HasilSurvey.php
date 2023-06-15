<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilSurvey extends Model
{
    use HasFactory;

    protected $table = 'hasil_survey';

    protected $fillable = [
        'calon_mitra_id',
        'tingkat_layak',
        'prioritas',
    ];

    public function calonMitra()
    {
        return $this->belongsTo(CalonMitra::class, 'calon_mitra_id');
    }
}
