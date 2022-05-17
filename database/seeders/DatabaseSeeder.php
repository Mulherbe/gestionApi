<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(100)->create();
        \App\Models\Category::factory(10)->create();
        \App\Models\Client::factory(10)->create();
        \App\Models\Calendar::factory(10)->create();
        \App\Models\Cloud::factory(10)->create();
        \App\Models\Cost::factory(10)->create();
        \App\Models\Note::factory(10)->create();
        \App\Models\Project::factory(10)->create();
        \App\Models\Setting::factory(1)->create();
        \App\Models\Todo::factory(10)->create();




    }
}
