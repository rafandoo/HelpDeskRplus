<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Status>
 */
class StatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'description' => $this->faker->unique()->word,
            'active' => $this->faker->boolean,
            'created_at' => $this->faker->dateTime,
            'updated_at' => $this->faker->dateTime
        ];
    }
}
