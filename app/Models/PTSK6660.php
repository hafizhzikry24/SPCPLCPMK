<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PTSK6660 extends Model
{
    use HasFactory;

    protected $table = "ptsk6660";
    protected $primaryKey = "id";
    protected $fillable = [
        'nim', 'nama',
        'cpl2', 'cpl3', 'cpl4', 'cpl6', 'outcome',
        'cpmk1', 'cpmk2', 'cpmk3', 'cpmk4', 'cpmk5', 'cpmk6', 'cpmk7'
    ];
}
