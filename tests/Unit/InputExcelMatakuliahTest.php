<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Imports\ExcelImportNilaiMahasiswa;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Models\NilaiMahasiswa;
use App\Models\User;


class InputExcelMatakuliah extends TestCase
{
    use DatabaseMigrations;
    use WithFaker; // If you want to use faker functionality
    use RefreshDatabase;

    public function testExcelImportModel()
    {
        // Create a user manually
        $user = User::create([
            'name' => 'Admin1',
            'email' => 'admin1@admin.com',
            'NIP' => 'ADMIN1',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'is_admin' => 1
        ]);

        // Authenticate the user
        $this->actingAs($user);

        $import = new ExcelImportNilaiMahasiswa();
    
        // Test model method
        $row = [
            'id_matkul' => 'PTSK6000',
            'tahun' => '2023-2024',
            'semester' => 'Ganjil',
            'nim' => '21120120140914',
            'nama' => 'Laine Nathania',
            'outcome' => 'LULUS',
        ];
    
        $model = $import->model($row);
    
        $this->assertInstanceOf(NilaiMahasiswa::class, $model);
        $this->assertEquals($row['id_matkul'], $model->id_matkul);
        $this->assertEquals($row['tahun'], $model->tahun_akademik_matkul);
        $this->assertEquals($row['semester'], $model->semester_matkul);
        $this->assertEquals($row['nim'], $model->nim);
        $this->assertEquals($row['nama'], $model->nama);
        $this->assertEquals($row['outcome'], $model->outcome);
    
        // Create a test Excel file
        Storage::fake('public'); // Use the public disk instead of the default one
        $file = UploadedFile::fake()->create('example.xlsx', 100);
    
        // Simulate successful import
        Excel::shouldReceive('import')->once()->with($import, 'DataMatkul\example.xlsx');
        Excel::getFacadeRoot()->import($import, 'DataMatkul\example.xlsx');
    
        // Assert a redirect response
        $response = $this->call('POST', route('mata_kuliah.inputexcel', [
            'tahun_akademik_matkul' => '2023-2024',
            'semester_matkul' => 'Ganjil',
            'matkul_id' => 'PTSK6000',
        ]), [], [], ['file' => $file]);
    
        $response->assertRedirect(route('mata_kuliah', [
            'tahun_akademik_matkul' => '2023-2024',
            'semester_matkul' => 'Ganjil',
            'matkul_id' => 'PTSK6000',
        ]));
    }
    
}
