<?php

use Illuminate\Database\Seeder;

class ReviewCategoriesSeeder extends Seeder
{
    public function run()
    {
        $data = array(
        	'Torre',
			'Subestructura',
			'Bloque Viajero',
			'Malacate',
			'Ancla',
			'Mesa Rotaria',
			'Top Drive',
			'Catwalk',
			'Bombas de Lodo',
			'Stand Pipe',
			'Control de Sólidos',
			'Tanques de Lodo',
			'Motores y Generador',
			'Compresores y Sistema Neumático',
			'Control de Pozos',
			'Acumulador',
			'Choke Manifold',
			'MCC',
			'SCR'
        );

        foreach($data as $row){
	        DB::table('review_categories')->insert([
	            'name' => $row,
	        ]);
    	}
    }
}
