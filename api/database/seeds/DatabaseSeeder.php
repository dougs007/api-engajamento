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
        $this->call([
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            ActivityTableSeeder::class,
            HelpedPersonTableSeeder::class,
            RevisionTableSeeder::class,
            PersonActivityTableSeeder::class
        ]);
    }
}
