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
        $student_id = $row['nim'];
        $subject_id = $row['id_matkul'];
        $new_outcome = $row['outcome'];
        $new_year = $row['tahun'];
        $new_semester = $row['semester'];
    
        // Define outcome priorities
        $outcome_priority = [
            'TIDAK LULUS' => 0,
            'REMIDI CPMK' => 1,
            'LULUS' => 2,
        ];
    
        // Find the existing grade entry for this student and subject
        $existingGrade = NilaiMahasiswa::where('nim', $student_id)
            ->where('id_matkul', $subject_id)
            ->orderBy('tahun_akademik_matkul', 'desc')
            ->orderBy('semester_matkul', 'desc')
            ->first();
    
        if ($existingGrade) {
            $existing_outcome = $existingGrade->outcome;
            $existing_year = $existingGrade->tahun_akademik_matkul;
            $existing_semester = $existingGrade->semester_matkul;
    
            // Check if the new outcome is better or if it's the same outcome but new year/semester is later
            if ($outcome_priority[$new_outcome] > $outcome_priority[$existing_outcome] || ($new_year > $existing_year || ($new_year == $existing_year && $new_semester > $existing_semester))) {
                // Update the grade, year, and semester
                $existingGrade->update([
                    'tahun_akademik_matkul' => $new_year,
                    'semester_matkul' => $new_semester,
                    'cpl1' => $row['cpl1'] ?? $existingGrade->cpl1,
                    'cpl2' => $row['cpl2'] ?? $existingGrade->cpl2,
                    'cpl3' => $row['cpl3'] ?? $existingGrade->cpl3,
                    'cpl4' => $row['cpl4'] ?? $existingGrade->cpl4,
                    'cpl5' => $row['cpl5'] ?? $existingGrade->cpl5,
                    'cpl6' => $row['cpl6'] ?? $existingGrade->cpl6,
                    'cpl7' => $row['cpl7'] ?? $existingGrade->cpl7,
                    'cpl8' => $row['cpl8'] ?? $existingGrade->cpl8,
                    'cpl9' => $row['cpl9'] ?? $existingGrade->cpl9,
                    'cpl10' => $row['cpl10'] ?? $existingGrade->cpl10,
                    'cpl11' => $row['cpl11'] ?? $existingGrade->cpl11,
                    'cpl12' => $row['cpl12'] ?? $existingGrade->cpl12,
                    'outcome' => $new_outcome,  // Update outcome with new grade
                    'cpmk1' => $row['cpmk1'] ?? $existingGrade->cpmk1,
                    'cpmk2' => $row['cpmk2'] ?? $existingGrade->cpmk2,
                    'cpmk3' => $row['cpmk3'] ?? $existingGrade->cpmk3,
                    'cpmk4' => $row['cpmk4'] ?? $existingGrade->cpmk4,
                    'cpmk5' => $row['cpmk5'] ?? $existingGrade->cpmk5,
                    'cpmk6' => $row['cpmk6'] ?? $existingGrade->cpmk6,
                    'cpmk7' => $row['cpmk7'] ?? $existingGrade->cpmk7,
                    'cpmk8' => $row['cpmk8'] ?? $existingGrade->cpmk8,
                    'cpmk9' => $row['cpmk9'] ?? $existingGrade->cpmk9,
                    'cpmk10' => $row['cpmk10'] ?? $existingGrade->cpmk10,
                ]);
            }
        } else {
            // Insert a new grade if no previous record exists
            return new NilaiMahasiswa([
                'id_matkul' => $subject_id,
                'tahun_akademik_matkul' => $new_year,
                'semester_matkul' => $new_semester,
                'nim' => $student_id,
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
                'outcome' => $new_outcome,
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
