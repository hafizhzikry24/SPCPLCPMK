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
        // Fake Excel facade
        Excel::fake();

        // Fake storage
        Storage::fake('public');

        // Create a fake Excel file
        $file = UploadedFile::fake()->create('x1.xlsx');

        // Store the fake Excel file in the public/DataMatkul directory
        $file->storeAs('public/DataMatkul', 'x1.xlsx');

        // Perform the import action
        $response = $this->post('/mata_kuliah/excel/2023-2024/Ganjil/PTSK6001', [
            'file' => $file,
        ]);

        $this->assertFileExists(storage_path('app/public/DataMatkul/x1.xlsx'));

        // Assert that the import action redirects successfully
        $response->assertRedirect();
    }
}
