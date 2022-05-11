<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'showClient' => true,
            'showProject' => true,
            'showTodo' => true,
            'showCloud' => true,
            'showNote' => true,
            'showCost' => true,
            'showWallets' => true,
            'color' =>  $this->faker->hexcolor(),
            'id_user' => 1,    
            ];
    }
}
