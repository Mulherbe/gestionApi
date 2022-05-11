<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
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
            'text' =>$this->faker->text(),
            'id_user' => 1,
            'id_client' => 1,
            'id_category' => 1        
        ];        
    }
}
