<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'doc' => $i,
            'name' => 'Juan Camilo',
            'email' => 'email '.$i,
            'password' => 'ABC'.$i
        ]);

        DB::table('users')->insert([
            'doc' => $i,
            'name' => 'Camilo',
            'email' => 'email '.$i,
            'password' => 'ABC'.$i
        ]);

        DB::table('users')->insert([
            'doc' => $i,
            'name' => 'Pablo',
            'email' => 'email '.$i,
            'password' => 'ABC'.$i
        ]);

        DB::table('users')->insert([
            'doc' => $i,
            'name' => 'Juan Pablo',
            'email' => 'email '.$i,
            'password' => 'ABC'.$i
        ]);

        DB::table('users')->insert([
            'doc' => $i,
            'name' => 'Jose',
            'email' => 'email '.$i,
            'password' => 'ABC'.$i
        ]);

        DB::table('users')->insert([
            'doc' => $i,
            'name' => 'Juan Jose',
            'email' => 'email '.$i,
            'password' => 'ABC'.$i
        ]);

        DB::table('users')->insert([
            'doc' => $i,
            'name' => 'Luis Jose',
            'email' => 'email '.$i,
            'password' => 'ABC'.$i
        ]);
    }
}
