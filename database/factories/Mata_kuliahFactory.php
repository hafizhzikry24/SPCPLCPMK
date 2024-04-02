<?php

namespace Database\Factories;

use App\Models\Mata_kuliah; // Replace with your CPL model path
use Illuminate\Database\Eloquent\Factories\Factory;

class Mata_kuliahFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mata_kuliah::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Generate a random year between 2023 and 2024
        $tahun_awal = 2023;
        $tahun_akhir = 2024;
        $tahun_akademik = $this->faker->numberBetween($tahun_awal, $tahun_akhir);
    
        // Construct the tahun_akademik value
        $tahun_akademik_value = $tahun_akademik . '-' . ($tahun_akademik + 1);
    
        return [
            'id' => $this->faker->unique()->randomNumber(),
            'kode_MK' => 'PTSK' . $this->faker->unique()->randomNumber(4), // Example pattern for kode_MK
            'Mata_Kuliah' => $this->faker->word, // Example of a random word for Mata_Kuliah
            'semester' => $this->faker->numberBetween(1, 10), // Example of a random semester between 1 and 10
            'cpl' => 'Test cpl', // Example value for cpl
            'SKS' => $this->faker->randomDigitNotNull, // Example of a random digit for SKS
            'cpmk' => 'Test cpmk', // Example value for cpmk
            'NIP' => 'Test NIP', // Example value for NIP
            'tahun_akademik' => $tahun_akademik_value, // Constructed tahun_akademik value
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
    
}