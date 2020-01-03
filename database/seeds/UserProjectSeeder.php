<?php

use Illuminate\Database\Seeder;

class UserProjectSeeder extends Seeder
{
    public function run()
    {
        for($i = 1; $i < 6; $i++){
	        DB::table('user_project')->insert([
	            'project_id' => $i,
	            'user_doc' => 1,
	        ]);
    	}
    }
}
