<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pondok extends Model
{
    protected $table = 'pondok';

    protected $fillable = [
        'hasil_survey_id',
        'calon_mitra_id',
        'rencana_jumlah_penyaluran',
        'cp',
        'cp_no_hp',
    ];

    public function hasilSurvey()
    {
        return $this->belongsTo(HasilSurvey::class, 'hasil_survey_id');
        //saya akan mengambil hasilSurvey->calonMitra->nama_pondok, karena disini ada verifikasi
    }

    public function calonMitra()
    {
        return $this->belongsTo(CalonMitra::class, 'calon_mitra_id');
        //saya akan mengambil beberapa data semisal calonMitra->alamat
    }
}
