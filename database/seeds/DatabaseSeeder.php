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
        $this->call( AuthorsTableSeeder::class );
        $this->call( ReferralsTableSeeder::class );
        $this->call( UsersTableSeeder::class );
    }
}
