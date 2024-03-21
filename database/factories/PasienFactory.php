<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pasien>
 */
class PasienFactory extends Factory
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
            'kode_rm' => "RM". $now. $this->faker->unique()->numberBetween($min = 1, $max = 300),
            'id_satu_sehat' => "55531". $now. $this->faker->unique()->numberBetween($min = 100, $max = 300),
            'nik' => "625312132". $now. $this->faker->unique()->numberBetween($min = 100, $max = 300),
            'kis' => "801231212". $now. $this->faker->unique()->numberBetween($min = 100, $max = 300),
            'nama' => $this->faker->name(),
            'tanggal_lahir' => $now,
            'jenis_kelamin' => $this->faker->randomElement(['L','P']),
            'nomor_hp' => $this->faker->phoneNumber(),
            'alamat' => $this->faker->address(),
        ];
    }
}
