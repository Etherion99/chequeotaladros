<?php

use Illuminate\Database\Seeder;

class ReviewsSeeder extends Seeder
{
    public function run()
    {
        for($i = 1; $i < 6; $i++){
	        DB::table('projects')->insert([
	            'name' => 'nombre '.$i,
	            'creator' => $i,
	        ]);
    	}

    	for($i = 1; $i < 6; $i++){
	        DB::table('projects')->insert([
	            'name' => 'nombre '.$i,
	            'creator' => $i,
	        ]);
    	}

    	for($i = 1; $i < 6; $i++){
	        DB::table('projects')->insert([
	            'name' => 'nombre '.$i,
	            'creator' => $i,
	        ]);
    	}
    }
}
