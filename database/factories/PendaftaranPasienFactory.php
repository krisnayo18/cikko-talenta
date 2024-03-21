<?php

namespace Database\Factories;

use App\Models\Antrian;
use App\Models\Dokter;
use App\Models\JenisKunjungan;
use App\Models\Pasien;
use App\Models\Penjamin;
use App\Models\Perawat;
use App\Models\PoliTujuan;
use App\Models\RuangRawat;
use App\Models\SkriningVisual;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PendaftaranPasienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $now = Carbon::now();
        $sv = SkriningVisual::inRandomOrder()->first(); // Retrieve a random user
        $pasien = Pasien::inRandomOrder()->first(); // Retrieve a random user
        $antrian = Antrian::inRandomOrder()->first(); // Retrieve a random user
        $penjamin = Penjamin::inRandomOrder()->first(); // Retrieve a random user
        $jk = JenisKunjungan::inRandomOrder()->first(); // Retrieve a random user
        $pt = PoliTujuan::inRandomOrder()->first(); // Retrieve a random user
        $rr = RuangRawat::inRandomOrder()->first(); // Retrieve a random user
        $dokter = Dokter::inRandomOrder()->first(); // Retrieve a random user
        $perawat = Perawat::inRandomOrder()->first(); // Retrieve a random user
        
        return [
            'nomor_registrasi' => "RG240301". $this->faker->unique()->numberBetween($min = 1, $max = 300),
            'tgl_berobat' => $now,
            'status_pcare' => $this->faker->randomElement(['y','t']),
            'status_satu_sehat' => $this->faker->randomElement(['y','t']),
            'status_antrian' => $this->faker->randomElement(['y','t']),
            'jenis_rawat' => $this->faker->randomElement(['rawat_jalan','promotif_preventif']),
            'status_kunjungan' => $this->faker->randomElement(['online','offline']),
            'status_kasir' => $this->faker->randomElement(['y','t']),
            'pasien_id' =>    $pasien->id,
            'skrining_visual_id' =>    $sv->id,
            'antrian_id' =>    $antrian->id,
            'penjamin_id' =>    $penjamin->id,
            'jenis_kunjungan_id' =>    $jk->id,
            'poli_tujuan_id' =>    $pt->id,
            'ruang_rawat_id' =>    $rr->id,
            'dokter_id' =>    $dokter->id,
            'perawat_id' =>    $perawat->id,
        ];
    }
}
