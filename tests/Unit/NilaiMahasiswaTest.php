<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use App\Models\User; // Import your User model

class NilaiMahasiswaControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test the view method of NilaiMahasiswaController.
     *
     * @return void
     */
    public function testView()
    {
        // Create a user with necessary permissions
        $user = User::factory()->create([
            // Add necessary permissions to the user
        ]);
        $this->actingAs($user);

        // Define sample parameters for the route
        $tahun_akademik = '2023-2024';
        $semester = 'Ganjil';
        $kode_MK = 'PTSK6666';

        // Make a request to the controller method
        $response = $this->get("/mata_kuliah/$tahun_akademik/$semester/$kode_MK");

        // Assert that the view is returned successfully
        $response->assertStatus(200);

        // Assert that the necessary data is passed to the view
        $response->assertViewHasAll(['matakuliah_info', 'cplColumns', 'matkul_id', 'semester_matkul', 'tahun_akademik_matkul', 'selectedCpl', 'selectedCpmk', 'pieChartCPMK', 'pieChartCPL', 'barChartCPL']);
    }

    /**
     * Test the datatables method of NilaiMahasiswaController.
     *
     * @return void
     */
    public function testDatatables()
    {
        // Create a user with necessary permissions
        $user = User::factory()->create([
            // Add necessary permissions to the user
        ]);
        $this->actingAs($user);

        // Define sample parameters for the route
        $tahun_akademik = '2023-2024';
        $semester = 'Ganjil';
        $kode_MK = 'PTSK6666';

        // Make a request to the controller method
        $response = $this->get("/datatables/$tahun_akademik/$semester/$kode_MK");

        // Assert that the response is successful
        $response->assertStatus(200);

        // Assert the structure of the JSON response
        $response->assertJsonStructure(['data', 'draw', 'recordsTotal', 'recordsFiltered']);
    }
}

