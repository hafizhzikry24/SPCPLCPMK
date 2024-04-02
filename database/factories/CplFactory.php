<?php

namespace Database\Factories;

use App\Models\Cpl; // Replace with your CPL model path
use Illuminate\Database\Eloquent\Factories\Factory;

class CplFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cpl::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->unique()->randomNumber(),
            'nama' => $this->faker->name,
            'desc' => $this->faker->sentence,
            // Add additional CPL data fields here
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
    
}