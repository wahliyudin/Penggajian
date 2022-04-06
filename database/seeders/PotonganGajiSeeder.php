<?php

namespace Database\Seeders;

use App\Models\PotonganGaji;
use Illuminate\Database\Seeder;

class PotonganGajiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ket = [
            [
                'nama' => 'hadir',
                'potongan' => 0,
            ],
            [
                'nama' => 'sakit',
                'potongan' => 0,
            ],
            [
                'nama' => 'alpha',
                'potongan' => 100_000
            ]
        ];
        foreach ($ket as $value) {
            PotonganGaji::create($value);
        }
    }
}
