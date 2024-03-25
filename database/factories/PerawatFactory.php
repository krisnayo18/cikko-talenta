<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Perawat>
 */
class PerawatFactory extends Factory
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
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'tanggal_lahir' => $now,
            'tanggal_gabung' => $now,
            'jenis_kelamin' => $this->faker->randomElement(['L','P']),
            'nomor_hp' => $this->faker->phoneNumber(),
            'alamat' => $this->faker->address(),
        ];
    }
}
