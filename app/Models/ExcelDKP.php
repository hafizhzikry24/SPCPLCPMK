<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExcelDKP extends Model
{
    use HasFactory;

    protected $table = "exceldkps";
    protected $primaryKey = "id";
    protected $fillable = [
        'nim', 'nama', 'cpl2', 'cpl3', 'cpl5', 'cpl6', 'cpl7', 'cpl9'
    ];
}
