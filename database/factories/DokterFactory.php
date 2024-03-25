<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dokter>
 */
class DokterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $now = Carbon::now();

        return [
            'nama' => $this->faker->name(),
            'tanggal_lahir' => $now,
            'tanggal_gabung' => $now,
            'jenis_kelamin' => $this->faker->randomElement(['L','P']),
            'spesialis' => $this->faker->randomElement(['penyakit dalam','penyakit anak','saraf','kandungan','bedah']),
            'nomor_hp' => $this->faker->phoneNumber(),
            'alamat' => $this->faker->address(),
        ];
    }
}
