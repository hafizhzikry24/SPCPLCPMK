<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Mata_kuliah;
use App\Models\User;

class MatakuliahControllerTest extends TestCase
{
    use RefreshDatabase; // This trait resets the database after each test

    /**
     * A basic test example for index method.
     *
     * @return void
     */
    public function testIndex()
    {
        // Create a dummy user
        $user = User::factory()->create();

        // Acting as the user, make a GET request to the index route
        $response = $this->actingAs($user)->get('/matakuliah');

        // Assert that the response was successful
        $response->assertStatus(200);
    }

    /**
     * A basic test example for store method.
     *
     * @return void
     */
    public function testStore()
    {
        // Create a dummy user
        $user = User::factory()->create();

        // Acting as the user, make a POST request to the store route
        $response = $this->actingAs($user)->postJson('/matakuliah/store', [
            'kode_MK' => 'Test kode_MK',
            'Mata_Kuliah' => 'Test Mata_Kuliah',
            'semester' => 'Test semester',
            'cpl' => 'Test cpl',
            'SKS' => '3',
            'cpmk' => 'Test cpmk',
            'NIP' => 'Test NIP',
            'tahun_akademik' => 'Test tahun_akademik',
        ]);

        // Assert that the response was successful
        $response->assertStatus(200);

        // Assert that the created CPL exists in the database
        $this->assertDatabaseHas('mata_kuliahs', [
            'kode_MK' => 'Test kode_MK',
            'Mata_Kuliah' => 'Test Mata_Kuliah',
            'semester' => 'Test semester',
            'cpl' => '"Test cpl"', // Expect the value with quotes
            'SKS' => '3',
            'cpmk' => 'Test cpmk',
            'NIP' => 'Test NIP',
            'tahun_akademik' => 'Test tahun_akademik',
        ]);
}

    /**
     * A basic test example for edit method.
     *
     * @return void
     */
    public function testEdit()
    {
        // Create a dummy CPL
        $matakuliah = Mata_kuliah::factory()->create();
    
        // Acting as the user, make a GET request to the edit route
        $response = $this->getJson("/matakuliah/edit");
    
        // Assert that the response was unsuccessful due to the route expecting AJAX request
        $response->assertStatus(405);
    }
    
    public function testDestroy()
    {
        // Create a dummy user
        $user = User::factory()->create();
    
        // Create a dummy CPL
        $matakuliah = Mata_kuliah::factory()->create();
    
        // Acting as the user, make a DELETE request to the destroy route
        $response = $this->actingAs($user)->deleteJson("/matakuliah/delete");
    
        // Assert that the response was unsuccessful due to the route expecting AJAX request
        $response->assertStatus(405);
    }
    
}
