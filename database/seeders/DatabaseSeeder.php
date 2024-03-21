<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Penjamin;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            JenisKunjunganSeeder::class,
            PoliTujuanSeeder::class,
            RuangRawatSeeder::class,
            SkriningVisualSeeder::class,
            PenjaminSeeder::class,
        ]);
        \App\Models\User::factory(10)->create();
        \App\Models\Dokter::factory(10)->create();
        \App\Models\Pasien::factory(10)->create();
        \App\Models\Perawat::factory(10)->create();
        \App\Models\Antrian::factory(10)->create();
        \App\Models\PendaftaranPasien::factory(10)->create();
    }
}
