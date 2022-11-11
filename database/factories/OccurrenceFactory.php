<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OccurrenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $ticket = \App\Models\Ticket::inRandomOrder()->first();
        $user = \App\Models\User::inRandomOrder()->first();
        return [
            'created_at' => $this->faker->dateTime,
            'initial_time' => $this->faker->time('H:i:s'),
            'final_time' => $this->faker->time('H:i:s'),
            'description' => $this->faker->text,
            'ticket_id' => $ticket->id,
            'user_id' => $user->id
        ];
    }
}
