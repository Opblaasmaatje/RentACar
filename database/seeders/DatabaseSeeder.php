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
        \App\Models\Country::factory(5)->create();
        \App\Models\Brand::factory(10)->create();
        \App\Models\Gas::factory(2)->create();
        \App\Models\User::factory(10)->create();
        \App\Models\Store::factory(5)->create();
        \App\Models\Car::factory(25)->create();
        \App\Models\Invoice::factory(10)->create();
    }
}
