<?php

use Illuminate\Database\Seeder;

class ProjectsSeeder extends Seeder
{
    public function run()
    {
        for($i = 1; $i < 6; $i++){
	        DB::table('projects')->insert([
	            'name' => 'nombre '.$i,
	            'creator' => $i,
	        ]);
    	}
    }
}
