<?php

use App\Models\NilaiMahasiswa;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NilaiMahasiswaControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Test the datatables method of NilaiMahasiswaController.
     *
     * @return void
     */
    public function testPageNilaiMahasiswa()
    {
        // Create a user with necessary permissions (assuming admin)
        $user = User::factory()->create([
            'is_admin' => 1,
        ]);
        // Create sample data
        $response = $this->actingAs($user)->postJson('/matakuliah/store', [
            'kode_MK' => 'PTSKTEST',
            'Mata_Kuliah' => 'Test Mata Kuliah',
            'semester' => 'Ganjil',
            'cpl' => 'Test cpl',
            'SKS' => '3',
            'cpmk' => 'Test cpmk',
            'NIP' => 'Test NIP',
            'tahun_akademik' => '2023-2024',
        ]);

        // Authenticate the user
        $this->actingAs($user);
        
        // Assert that the user is an admin
        $this->assertTrue($user->isAdmin());

        // Define sample parameters for the route
        $tahun_akademik = '2023-2024';
        $semester = 'Ganjil';
        $kode_MK = 'PTSKTEST';

        // Make a request to the controller method
        $response = $this->get("/datatables/$tahun_akademik/$semester/$kode_MK");

        // Assert that the response status is 200 (or 403 if user lacks permission)
        $response->assertStatus($user->is_admin ? 200 : 403);
    }
}

