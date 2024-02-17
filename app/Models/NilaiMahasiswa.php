<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiMahasiswa extends Model
{
    use HasFactory;

    protected $table = "nilai_mahasiswa";
    protected $primaryKey = "id";
    protected $fillable = [
        'id_matkul','tahun', 'semester', 'nim', 'nama',
        'cpl1', 'cpl2', 'cpl3', 'cpl4','cpl5', 'cpl6', 'cpl7', 'cpl8','cpl9', 'cpl10', 'cpl11', 'cpl12',
        'outcome',
        'cpmk1', 'cpmk2', 'cpmk3', 'cpmk4', 'cpmk5', 'cpmk6', 'cpmk7', 'cpmk8', 'cpmk9', 'cpmk10'
    ];
}
