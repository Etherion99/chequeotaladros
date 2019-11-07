<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        for($i = 1; $i < 6; $i++){
	        DB::table('users')->insert([
	            'doc' => $i,
	            'name' => 'nombre '.$i,
	            'email' => 'email '.$i,
	            'password' => 'ABC'.$i
	        ]);
    	}
    }
}
