<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        //faker locale pt_BR
        $this->faker->addProvider(new \Faker\Provider\pt_BR\Address($this->faker));
        // cliente é unico para cada endereço e não pode ser repetido

        try {
            $client = \App\Models\Client::inRandomOrder()
            ->whereNotIn('id', Address::all()->pluck('client_id'))
            ->first();
        } catch (\Throwable $th) {
            $client = \App\Models\Client::inRandomOrder()->first();
        }
    
        $city = \App\Models\City::inRandomOrder()->first();

        return [
            'client_id' => $client->id,
            'street' => $this->faker->streetName,
            'number' => $this->faker->buildingNumber,
            'complement' => $this->faker->secondaryAddress,
            'neighborhood' => $this->faker->citySuffix,
            'zip_code' => $this->faker->postcode,
            'city_id' => $city->id,
            'created_at' => $this->faker->dateTime,
            'updated_at' => $this->faker->dateTime
        ];
    }
}
