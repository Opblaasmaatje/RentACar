<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->catchPhrase(),
            'price' => $this->faker->numberBetween(10, 100),
            'isAutomatic' => $this->faker->boolean(50),
            'isAvailible' => true,
            'img' => $this->faker->imageUrl(640, 480, "cats"),
            'gas_id' => random_int(1,2),
            'store_id' => random_int(1,5),
            'brand_id' => random_int(1,10),
        ];
    }
}
