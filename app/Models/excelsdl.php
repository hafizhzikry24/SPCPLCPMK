<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class excelsdl extends Model
{
    use HasFactory;

    protected $table = "excelsdls";
    protected $primaryKey = "id";
    protected $fillable = [
        'nim', 'nama',
        'cpl3', 'outcome',
        'cpmk1', 'cpmk2', 'cpmk3', 'cpmk4'
    ];
}
