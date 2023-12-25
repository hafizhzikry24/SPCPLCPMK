<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cpl extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'nama', 'desc'];

    // public function excelDKPs()
    // {
    //     return $this->hasMany(ExcelDKP::class, 'cpl_id');
    // }
}
