<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Conference>
 */
class ConferenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    return [
        'title' => fake()->sentence(4),
        'description' => fake()->paragraph(4),
        'speakers' => fake()->name() . ', ' . fake()->name(),
        'start_date' => fake()->date(),
        'start_time' => fake()->time(),
        'address' => fake()->streetAddress() . ', ' . fake()->city(),
    ];
}

}
