<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'postalcode' => $this->faker->unique()->postcode(),
            'phonenumber' => $this->faker->unique()->phoneNumber(),
            'street' => $this->faker->unique()->streetName(),
            'city' => $this->faker->unique()->city(),
            'country_id' => random_int(1, 5)
        ];
    }
}
