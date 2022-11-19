<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ServiceOrder>
 */
class ServiceOrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $ticket = \App\Models\Ticket::inRandomOrder()->first();
        return [
            'ticket_id' => $ticket->id,
            'value' => $this->faker->randomFloat(2, 0, 999999),
            'created_at' => $this->faker->dateTime,
            'updated_at' => $this->faker->dateTime,
            'description' => $this->faker->text
        ];
    }
}
