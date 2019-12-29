<?php

use Illuminate\Database\Seeder;

class ReviewsSeeder extends Seeder
{
    public function run()
    {
        for($i = 1; $i < 6; $i++){
	        DB::table('reviews')->insert([
	            'project_id' => $i,
	            'creator_doc' => 1,
	        ]);
    	}

    	for($i = 1; $i < 6; $i++){
	        DB::table('reviews')->insert([
	            'project_id' => $i,
	            'creator_doc' => 2,
	        ]);
    	}

    	for($i = 1; $i < 6; $i++){
	        DB::table('reviews')->insert([
	            'project_id' => $i,
	            'creator_doc' => 3,
	        ]);
    	}
    }
}
