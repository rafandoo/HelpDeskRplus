<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\City>
 */
class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $state = \App\Models\State::inRandomOrder()->first();
        return [
            "name" => $this->faker->words(2, true),
            "state_id" => $state->id
        ];
    }
}
