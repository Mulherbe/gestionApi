<?php

namespace Database\Factories;
use App\Http\Models\Client;
use App\Http\Models\User; 
use Faker\Provider\Base;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {

        return [
        'firstName' => $this->faker->firstName(),
        'name' => $this->faker->lastname(),
        'phone' =>$this->faker->phoneNumber(),
        'company' => $this->faker->company(),
        'id_user' => 1
    ];
    }
}
