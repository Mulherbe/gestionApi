<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CloudFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pathFichier' => $this->faker->dateTime(),
            'title' => $this->faker->word(),
            'comment' =>$this->faker->text(),
            'id_user' => 1,
            'id_category' => 1

        ];
    }
}
