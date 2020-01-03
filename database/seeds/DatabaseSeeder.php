<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
        	UsersSeeder::class,
        	ProjectsSeeder::class,
            UserProjectSeeder::class,
            ReviewsSeeder::class,
        	ReviewCategoriesSeeder::class,
        	ReviewItemsSeeder::class
        ]);
    }
}
