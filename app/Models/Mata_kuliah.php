<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mata_kuliah extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'kode_MK', 'Mata_Kuliah', 'Tahun_ajaran', 'SKS'];
}
