<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'doc' => 1,
            'name' => 'Juan Camilo',
            'email' => 'email 1',
            'password' => Hash::make('ABC1')
        ]);

        DB::table('users')->insert([
            'doc' => 2,
            'name' => 'Camilo',
            'email' => 'email 2',
            'password' => Hash::make('ABC2')
        ]);

        DB::table('users')->insert([
            'doc' => 3,
            'name' => 'Pablo',
            'email' => 'email 3',
            'password' => Hash::make('ABC3')
        ]);

        DB::table('users')->insert([
            'doc' => 4,
            'name' => 'Juan Pablo',
            'email' => 'email 4',
            'password' => Hash::make('ABC4')
        ]);

        DB::table('users')->insert([
            'doc' => 5,
            'name' => 'Jose',
            'email' => 'email 5',
            'password' => Hash::make('ABC5')
        ]);

        DB::table('users')->insert([
            'doc' => 6,
            'name' => 'Juan Jose',
            'email' => 'email 6',
            'password' => Hash::make('ABC6')
        ]);

        DB::table('users')->insert([
            'doc' => 7,
            'name' => 'Luis Jose',
            'email' => 'email 7',
            'password' => Hash::make('ABC7')
        ]);
    }
}
