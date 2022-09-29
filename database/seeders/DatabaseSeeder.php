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
        $this->call(
          [
              BannersSeeder::class,
              CategoriesSeeder::class,
              ProductsSeeder::class,
              SlidersSeeder::class,
          ]
        );
    }
}
