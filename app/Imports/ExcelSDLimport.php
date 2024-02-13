<?php

namespace App\Imports;

use App\Models\excelsdl;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ExcelSDLimport implements ToModel, WithHeadingRow, WithMultipleSheets
{
    /**
    * @param array $row
    */
    public function model(array $row)
    {
        return new excelsdl([
            'nim' => $row['nim'],
            'nama' => $row['nama'],
            'cpl3' => $row['cpl3'],
            'outcome' => $row['outcome'],
            'cpmk1' => $row['cpmk1'],
            'cpmk2' => $row['cpmk2'],
            'cpmk3' => $row['cpmk3'],
            'cpmk4' => $row['cpmk4'],
        ]);
    }

    /**
     * Define sheets and their import classes.
     *
     * @return array
     */
    public function sheets(): array
    {
        return [
            'cpl-template' => $this,
        ];
    }
}
