<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cpmk extends Model
{
    use HasFactory;


    protected $fillable = ['id_cpmk', 'Matakuliah', 'CPL', 'Nama_CPL'];
}
