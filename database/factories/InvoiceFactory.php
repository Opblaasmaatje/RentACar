<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'car_id' => random_int(1,25),
            'email' => $this->faker->unique()->safeEmail(),
            'ordernumber' => $this->faker->unique()->ean8(),
            'rentStart' => now(),
            'rentEnd' => now(),
        ];
    }
}
