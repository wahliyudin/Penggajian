<?php

namespace Database\Seeders;

use App\Models\Absensi;
use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\PotonganGaji;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Jabatan::factory(10)->create();
        Pegawai::factory(100)->create();
        // Absensi::factory(100)->create();
        $this->call(LaratrustSeeder::class);
        $this->call(PotonganGajiSeeder::class);
    }
}
