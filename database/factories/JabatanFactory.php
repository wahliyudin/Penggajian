<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JabatanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gaji = $this->faker->numberBetween(1_000_000, 5_000_000);
        $tunjangan = $this->faker->numberBetween(100_000, 500_000);
        $uang_makan = $this->faker->numberBetween(100_000, 500_000);
        $total = $gaji + $tunjangan + $uang_makan;
        return [
            'nama' => $this->faker->name,
            'gaji_pokok' => $gaji,
            'tunjangan_transport' => $tunjangan,
            'uang_makan' => $uang_makan,
            'total' => $total,
        ];
    }
}
