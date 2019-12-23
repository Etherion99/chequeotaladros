<?php

use Illuminate\Database\Seeder;

class ProjectUserSeeder extends Seeder
{
    public function run()
    {
        for($i = 1; $i < 6; $i++){
	        DB::table('project_user')->insert([
	            'project_id' => $i,
	            'user_doc' => 1,
	        ]);
    	}
    }
}
