<?php

namespace App\Imports;

use App\Models\excelsdl;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ExcelSDLimport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new excelsdl([
            'nim' => $row['nim'],
            'nama' => $row['nama'],
            'cpl3' => $row['cpl3'],
        ]);
    }
}
