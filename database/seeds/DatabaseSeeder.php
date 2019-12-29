<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
        	UsersSeeder::class,
        	ProjectsSeeder::class,
            Reviews::class,
        	ProjectUsersSeeder::class,
        	ReviewCategoriesSeeder::class,
        	ReviewItemsSeeder::class
        ]);
    }
}
