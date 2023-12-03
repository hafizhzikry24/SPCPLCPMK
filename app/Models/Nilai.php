<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $fillable = ['id_nilai', 'Nilai_Tugas', 'Nilai_UTS', 'Nilai_Akhir', 'Nama_Akhir_Huruf', 'Nama', 'NIM', 'Semester', 'Matakuliah', 'Tahun_ajaran'];
}
