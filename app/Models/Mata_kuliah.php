<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mata_kuliah extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'id', 'kode_MK', 'Mata_Kuliah', 'semester', 'cpl', 'SKS', 'cpmk', 'NIP'];
}
