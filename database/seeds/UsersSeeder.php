<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 2)->state('customer')->create();
        factory(User::class, 2)->state('admin')->create();
        factory(User::class, 2)->state('employee')->create();
    }
}
