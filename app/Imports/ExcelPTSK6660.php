<?php

namespace App\Imports;

use App\Models\PTSK6660;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ExcelPTSK6660 implements ToModel, WithMultipleSheets, WithHeadingRow
{
    /**
    * @param array $row
    */
    public function model(array $row)
    {
        return new PTSK6660([
            'nim' => $row['nim'],
            'nama' => $row['nama'],
            'cpl2' => $row['cpl2'],
            'cpl3' => $row['cpl3'],
            'cpl4' => $row['cpl4'],
            'cpl6' => $row['cpl6'],
            'outcome' => $row['outcome'],
            'cpmk1' => $row['cpmk1'],
            'cpmk2' => $row['cpmk2'],
            'cpmk3' => $row['cpmk3'],
            'cpmk4' => $row['cpmk4'],
            'cpmk5' => $row['cpmk5'],
            'cpmk6' => $row['cpmk6'],
            'cpmk7' => $row['cpmk7'],
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
