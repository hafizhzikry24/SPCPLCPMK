<?php

use App\Models\NilaiMahasiswa;
use Illuminate\Database\Eloquent\Factories\Factory;

class NilaiMahasiswaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = NilaiMahasiswa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_matkul' => $this->faker->numberBetween(1, 100),
            'tahun_akademik_matkul' => $this->faker->year(),
            'semester_matkul' => $this->faker->randomElement(['Genap', 'Ganjil']),
            'nim' => $this->faker->unique()->numberBetween(10000000, 99999999),
            'nama' => $this->faker->name(),
            'cpl1' => $this->faker->randomFloat(2, 0, 4),
            'cpl2' => $this->faker->randomFloat(2, 0, 4),
            'cpl3' => $this->faker->randomFloat(2, 0, 4),
            'cpl4' => $this->faker->randomFloat(2, 0, 4),
            'cpl5' => $this->faker->randomFloat(2, 0, 4),
            'cpl6' => $this->faker->randomFloat(2, 0, 4),
            'cpl7' => $this->faker->randomFloat(2, 0, 4),
            'cpl8' => $this->faker->randomFloat(2, 0, 4),
            'cpl9' => $this->faker->randomFloat(2, 0, 4),
            'cpl10' => $this->faker->randomFloat(2, 0, 4),
            'cpl11' => $this->faker->randomFloat(2, 0, 4),
            'cpl12' => $this->faker->randomFloat(2, 0, 4),
            'outcome' => $this->faker->randomElement(['Lulus', 'Remidi CPMK', 'Tidak Lulus']),
            'cpmk1' => $this->faker->randomFloat(2, 0, 4),
            'cpmk2' => $this->faker->randomFloat(2, 0, 4),
            'cpmk3' => $this->faker->randomFloat(2, 0, 4),
            'cpmk4' => $this->faker->randomFloat(2, 0, 4),
            'cpmk5' => $this->faker->randomFloat(2, 0, 4),
            'cpmk6' => $this->faker->randomFloat(2, 0, 4),
            'cpmk7' => $this->faker->randomFloat(2, 0, 4),
            'cpmk8' => $this->faker->randomFloat(2, 0, 4),
            'cpmk9' => $this->faker->randomFloat(2, 0, 4),
            'cpmk10' => $this->faker->randomFloat(2, 0, 4),
        ];
    }
}
