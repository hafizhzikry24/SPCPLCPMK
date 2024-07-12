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

    public function mataKuliah()
    {
        return Mata_kuliah::where(function ($query) {
            $query->where('NIP', $this->NIP)
                  ->orWhere('NIP2', $this->NIP)
                  ->orWhere('NIP3', $this->NIP)
                  ->orWhere('NIP4', $this->NIP);
        });
    }
}
