<?php

namespace Database\Factories;

use App\Models\Jabatan;
use Illuminate\Database\Eloquent\Factories\Factory;

class PegawaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nik' => $this->faker->numberBetween(1_000_000, 10_000_000),
            'nama' => $this->faker->name,
            'jenis_kelamin' => $this->faker->randomElement(['laki-laki', 'perempuan']),
            'jabatan_id' => $this->faker->randomElement(Jabatan::pluck('id')->toArray()),
            'tgl_masuk' => $this->faker->date,
            'status' => $this->faker->randomElement(['tetap', 'tidak tetap']),
            'photo' => $this->faker->imageUrl('200', '200'),
        ];
    }
}
