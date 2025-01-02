<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pengguna;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'biodata' => $this->faker->paragraph,
            'age' => $this->faker->numberBetween(18, 60),
            'address' => $this->faker->address,
            'pengguna_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}
