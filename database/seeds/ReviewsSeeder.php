<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ReviewsSeeder extends Seeder
{
    public function run()
    {
        for($i = 1; $i < 6; $i++){
	        DB::table('reviews')->insert([
	            'project_id' => $i,
	            'creator_doc' => 1,
	            'created_at' => Carbon::now()->add($i, 'hour')->format('Y-m-d H:i:s')
	        ]);
    	}

    	for($i = 1; $i < 6; $i++){
	        DB::table('reviews')->insert([
	            'project_id' => $i,
	            'creator_doc' => 2,
	            'created_at' => Carbon::now()->add($i+1, 'hour')->format('Y-m-d H:i:s')
	        ]);
    	}

    	for($i = 1; $i < 6; $i++){
	        DB::table('reviews')->insert([
	            'project_id' => $i,
	            'creator_doc' => 3,
	            'created_at' => Carbon::now()->add($i+2, 'hour')->format('Y-m-d H:i:s')
	        ]);
    	}
    }
}
