<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = \App\Models\User::inRandomOrder()->first();
        $sector = \App\Models\Sector::inRandomOrder()->first();
        return [
            'user_id' => $user->id,
            'sector_id' => $sector->id,
            'admin' => $this->faker->boolean,   
            'created_at' => $this->faker->dateTime,
            'updated_at' => $this->faker->dateTime
        ];
    }
}
