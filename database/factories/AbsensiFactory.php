<?php

namespace Database\Factories;

use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Factories\Factory;

class AbsensiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pegawai_id' => $this->faker->unique()->randomElement(Pegawai::pluck('id')->toArray()),
            'hadir' => $this->faker->numberBetween(0, 24),
            'sakit' => $this->faker->numberBetween(0, 24),
            'alpha' => $this->faker->numberBetween(0, 24),
        ];
    }
}
