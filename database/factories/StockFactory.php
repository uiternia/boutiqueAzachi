<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Item;

class StockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'item_id' => Item::factory(),
            'type' => $this->faker->numberBetween(1,2),
            'quantity1' => $this->faker->randomNumber(1),
            'quantity2' => $this->faker->randomNumber(1),
            'quantity3' => $this->faker->randomNumber(1),
            'quantity4' => $this->faker->randomNumber(1),
        ];
    }
}
