<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Cpl;
use App\Models\Dosen;
use App\Models\User;

class DosenControllerTest extends TestCase
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
        $response = $this->actingAs($user)->get('/dosen');

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
        $response = $this->actingAs($user)->postJson('/dosen/store', [
            'NIP' => 'Test Dosen',
            'Nama_Dosen' => 'Test Dosen',
        ]);

        // Assert that the response was successful
        $response->assertStatus(200);

        // Assert that the created CPL exists in the database
        $this->assertDatabaseHas('dosens', [
            'NIP' => 'Test Dosen',
            'Nama_Dosen' => 'Test Dosen',
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
        $dosen = Dosen::factory()->create();
    
        // Acting as the user, make a GET request to the edit route
        $response = $this->getJson("/dosen/edit");
    
        // Assert that the response was unsuccessful due to the route expecting AJAX request
        $response->assertStatus(405);
    }
    
    public function testDestroy()
    {
        // Create a dummy user
        $user = User::factory()->create();
    
        // Create a dummy CPL
        $dosen = Dosen::factory()->create();
    
        // Acting as the user, make a DELETE request to the destroy route
        $response = $this->actingAs($user)->deleteJson("/dosen/delete");
    
        // Assert that the response was unsuccessful due to the route expecting AJAX request
        $response->assertStatus(405);
    }
    
}
