<?php

namespace App\Imports;

use App\Models\NilaiMahasiswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithValidation;

class ExcelImportNilaiMahasiswa implements ToModel, WithMultipleSheets, WithHeadingRow, WithValidation
{

    public function rules(): array
    {
        return [
            'id_matkul' => 'required',
            'tahun' => 'required',
            'semester' => 'required',
            'nim' => 'required',
            'nama' => 'required',
            'cpl1' => 'nullable',
            'cpl2' => 'nullable',
            'cpl3' => 'nullable',
            'cpl4' => 'nullable',
            'cpl5' => 'nullable',
            'cpl6' => 'nullable',
            'cpl7' => 'nullable',
            'cpl8' => 'nullable',
            'cpl9' => 'nullable',
            'cpl10' => 'nullable',
            'cpl11' => 'nullable',
            'cpl12' => 'nullable',
            'outcome' => 'required',
            'cpmk1' => 'nullable',
            'cpmk2' => 'nullable',
            'cpmk3' => 'nullable',
            'cpmk4' => 'nullable',
            'cpmk5' => 'nullable',
            'cpmk6' => 'nullable',
            'cpmk7' => 'nullable',
            'cpmk8' => 'nullable',
            'cpmk9' => 'nullable',
            'cpmk10' => 'nullable',
        ];
    }

    /**
    * @param array $row
    */
    public function model(array $row)
    {
        return new NilaiMahasiswa([
            'id_matkul' => $row['id_matkul'],
            'tahun' => $row['tahun'],
            'semester' => $row['semester'],
            'nim' => $row['nim'],
            'nama' => $row['nama'],
            'cpl1' => $row['cpl1'] ?? null,
            'cpl2' => $row['cpl2'] ?? null,
            'cpl3' => $row['cpl3'] ?? null,
            'cpl4' => $row['cpl4'] ?? null,
            'cpl5' => $row['cpl5'] ?? null,
            'cpl6' => $row['cpl6'] ?? null,
            'cpl7' => $row['cpl7'] ?? null,
            'cpl8' => $row['cpl8'] ?? null,
            'cpl9' => $row['cpl9'] ?? null,
            'cpl10' => $row['cpl10'] ?? null,
            'cpl11' => $row['cpl11'] ?? null,
            'cpl12' => $row['cpl12'] ?? null,
            'outcome' => $row['outcome'],
            'cpmk1' => $row['cpmk1'] ?? null,
            'cpmk2' => $row['cpmk2'] ?? null,
            'cpmk3' => $row['cpmk3'] ?? null,
            'cpmk4' => $row['cpmk4'] ?? null,
            'cpmk5' => $row['cpmk5'] ?? null,
            'cpmk6' => $row['cpmk6'] ?? null,
            'cpmk7' => $row['cpmk7'] ?? null,
            'cpmk8' => $row['cpmk8'] ?? null,
            'cpmk9' => $row['cpmk9'] ?? null,
            'cpmk10' => $row['cpmk10'] ?? null,
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
            'template-cpl-mahasiswa' => $this,
        ];
    }
}
