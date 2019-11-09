<?php

use Illuminate\Database\Seeder;

class ProjectsUsersSeeder extends Seeder
{
    public function run()
    {
        for($i = 1; $i < 6; $i++){
	        DB::table('users_projects')->insert([
	            'project_id' => $i,
	            'user_doc' => 2,
	        ]);
    	}
    }
}
