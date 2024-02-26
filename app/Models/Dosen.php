<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $fillable = ['NIP', 'Nama_Dosen'];

    public function mataKuliahs()
    {
        return $this->hasMany(Mata_kuliah::class, 'NIP', 'NIP');
    }
}
