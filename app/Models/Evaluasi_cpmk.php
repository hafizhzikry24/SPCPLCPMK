<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluasi_cpmk extends Model
{
    use HasFactory;
    protected $table = "evaluasi_cpmk";
    protected $primaryKey = 'id_evaluasi';

    protected $fillable = ['id_evaluasi', 'id_eval_matkul', 'semester_eval', 'tahun_akademik_eval', 'cpmk',
     'rerata', 'ambang', 'memenuhi', 'analisis_pelaksanaan', 'rencana_perbaikan', 'batas_ambang', 'batas_rerata'];
}
