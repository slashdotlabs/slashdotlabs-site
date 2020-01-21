<?php

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
        if (config('app.env') === 'local') {
            $this->call([
                ProductsSeeder::class,
                UsersSeeder::class,
                OrdersSeeder::class,
                UsersSeeder::class,
            ]);
        } else {
            $this->call([
                ProductsSeeder::class,
            ]);
        }
    }
}
