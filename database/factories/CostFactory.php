<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word(),
            'comment' =>$this->faker->text(),
            'price' =>rand(10,100),
            'date' => $this->faker->dateTime(),
            'id_user' => 1,
            'id_category' => 1        ];
    }
}
