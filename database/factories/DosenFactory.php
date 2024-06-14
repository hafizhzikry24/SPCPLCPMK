<?php

namespace Database\Factories;

use App\Models\Dosen; // Replace with your CPL model path
use Illuminate\Database\Eloquent\Factories\Factory;

class DosenFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Dosen::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_dosen' => $this->faker->unique()->randomNumber(),
            'NIP' => $this->faker->regexify('[A-Z]\.[0-9]\.\d{17}'), // Example pattern
            'Nama_Dosen' => $this->faker->name,
            // Add additional fields here if needed
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }    
}