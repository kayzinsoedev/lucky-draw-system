<?php

use Illuminate\Database\Seeder;

use App\User;
use App\PrizeType;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        PrizeType::truncate();
        // $this->call(UsersTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PrizeTableSeeder::class);

    }
}
