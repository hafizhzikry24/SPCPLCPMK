<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dosen extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $primaryKey = 'id_dosen';

    protected $fillable = ['NIP', 'Nama_Dosen'];

    public function mataKuliahs()
    {
        return $this->hasMany(Mata_kuliah::class, 'NIP', 'NIP');
    }
}
