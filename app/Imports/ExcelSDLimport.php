<?php

namespace App\Imports;

use App\Models\excelsdl;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\StringValueBinder;

class ExcelSDLimport extends StringValueBinder implements ToModel, WithHeadingRow, WithMultipleSheets, WithCustomValueBinder
{
    // /**
    //  * Bind the cell value to a data type.
    //  *
    //  * @param  Cell  $cell
    //  * @param  mixed  $value
    //  * @return mixed
    //  */
    // public function bindValue(Cell $cell, $value = null)
    // {
    //     // Check if the cell contains a formula
    //     if ($cell->isFormula()) {
    //         // Return the calculated value of the formula if available
    //         return $cell->getCalculatedValue();
    //     }

    //     // Default behavior for non-formula cells
    //     return parent::bindValue($cell, $value);
    // }

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
