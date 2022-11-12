<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        //faker locale pt_BR
        $this->faker->addProvider(new \Faker\Provider\pt_BR\Person($this->faker));
        $this->faker->addProvider(new \Faker\Provider\pt_BR\PhoneNumber($this->faker));
        $this->faker->addProvider(new \Faker\Provider\pt_BR\Address($this->faker));
        $this->faker->addProvider(new \Faker\Provider\pt_BR\Company($this->faker));
        return [
            'name' => $this->faker->name,
            'fantasy_name' => $this->faker->name,
            'cpf_cnpj' => $this->faker->randomElement([$this->faker->cpf(false), $this->faker->cnpj(false)]),
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'notes' => $this->faker->text,
            'active' => $this->faker->boolean,
            'created_at' => $this->faker->dateTime,
            'updated_at' => $this->faker->dateTime
        ];
    }
}
