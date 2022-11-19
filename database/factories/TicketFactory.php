<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $category = \App\Models\Category::inRandomOrder()->first();
        $priority = \App\Models\Priority::inRandomOrder()->first();
        $status = \App\Models\Status::inRandomOrder()->first();
        $sector = \App\Models\Sector::inRandomOrder()->first();
        $client = \App\Models\Client::inRandomOrder()->first();
        $user = \App\Models\User::inRandomOrder()->first();
        return [
            'title' => $this->faker->text(50),
            'description' => $this->faker->text,
            'created_at' => $this->faker->dateTime,
            'updated_at' => $this->faker->dateTime,
            'closed_at' => $this->faker->dateTime,
            'category_id' => $category->id,
            'priority_id' => $priority->id,
            'status_id' => $status->id,
            'sector_id' => $sector->id,
            'client_id' => $client->id,
            'contact' => $this->faker->name,
            'user_id' => $user->id
        ];
    }
}
