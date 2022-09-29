<?php

use Illuminate\Database\Seeder;
use App\Model\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $user = factory(User::class, 3)->create();
    }
}
