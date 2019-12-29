<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
        	UsersSeeder::class,
        	ProjectsSeeder::class,
            ReviewsSeeder::class,
        	ProjectUsersSeeder::class,
        	ReviewCategoriesSeeder::class,
        	ReviewItemsSeeder::class
        ]);
    }
}
