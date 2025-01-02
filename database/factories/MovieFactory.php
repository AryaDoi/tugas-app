<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Genre;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'synopsis' => $this->faker->paragraph,
            'poster' => $this->faker->imageUrl,
            'year' => $this->faker->year,
            'available' => $this->faker->boolean,
            'genre_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}
