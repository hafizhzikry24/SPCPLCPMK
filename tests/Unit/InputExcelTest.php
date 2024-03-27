<?php

use Tests\TestCase;
use App\Imports\ExcelImportNilaiMahasiswa;
use Illuminate\Http\UploadedFile;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ImportTest extends TestCase
{
    use RefreshDatabase;
    
    public function testUserCanImportExcelFile()
    {
        Excel::fake();
    
        // Store a fake Excel file in the public/DataMatkul directory for testing
        Storage::fake('public');
        $file = UploadedFile::fake()->create('test.xlsx');
        $filePath = 'public/DataMatkul/test.xlsx';
        $file->storeAs('public/DataMatkul', 'test.xlsx'); // Store the file in the public/DataMatkul directory

        $exists = Storage::disk('public')->exists('DataMatkul/test.xlsx');
        var_dump($exists);

        // Additional debugging information
        var_dump(Storage::disk('public')->exists($filePath));
    
        $tahun_akademik_matkul = '2023-2024';
        $semester_matkul = 'Ganjil';
        $matkul_id = 'PTSK6001';
    
        $response = $this->post("/mata_kuliah/excel/{$tahun_akademik_matkul}/{$semester_matkul}/{$matkul_id}", [
            'file' => $file,
        ]);
    
        $response->assertRedirect(); 
    
        Excel::assertImported('test.xlsx', 'DataMatkul'); 
        
        Excel::assertImported('test.xlsx', 'DataMatkul', function (ExcelImportNilaiMahasiswa $import) {
            $importedData = $import->collection(); // Get the imported data as a collection
            // Perform assertions on the imported data
            foreach ($importedData as $row) {
                if (
                    !isset($row['id_matkul']) || empty($row['id_matkul']) ||
                    !isset($row['tahun']) || empty($row['tahun']) ||
                    !isset($row['semester']) || empty($row['semester']) ||
                    !isset($row['outcome']) || empty($row['outcome']) ||
                    !isset($row['nim']) || empty($row['nim'])
                ) {
                    return false; // Return false if any required field is not present or empty in any row
                }
            }
            return true; // If all assertions passed
        });
        
        Excel::assertImported('test.xlsx', function (ExcelImportNilaiMahasiswa $import) {
            $rules = $import->rules();
            $this->assertArrayHasKey('id_matkul', $rules);
            $this->assertArrayHasKey('tahun', $rules);
            $this->assertArrayHasKey('semester', $rules);
            $this->assertArrayHasKey('nim', $rules);
            $this->assertArrayHasKey('outcome', $rules);

            $this->assertTrue(in_array('required', $rules['id_matkul']));
            $this->assertTrue(in_array('required', $rules['tahun']));
            $this->assertTrue(in_array('required', $rules['semester']));
            $this->assertTrue(in_array('required', $rules['nim']));
            $this->assertTrue(in_array('required', $rules['outcome']));
            // Add more assertions for other fields if needed
            return true; // If all assertions passed
        });
        
    }
}

