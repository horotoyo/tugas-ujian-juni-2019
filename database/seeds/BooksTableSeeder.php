<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$faker 			= Factory::create('id_ID');		
        $categories_id  = DB::table('categories')->pluck('id');

    	for ($i=0; $i < 20; $i++) { 
    		
    		$data[$i]	= [
    			'isbn'			=> $faker->postcode."-".$faker->postcode,
                'category_id'   => $faker->randomElement($categories_id),
    			'title'			=> $faker->word,
    			'description'	=> $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
    			'author'		=> $faker->name,
    			'publisher'		=> $faker->company,
    			'print'			=> $faker->randomDigit,
    			'date_rilies'	=> $faker->dateTime($max = 'now', $timezone = 'Asia/Jakarta'),
    			'place_rilies'	=> $faker->city,
    			'quantity'		=> $faker->randomDigit,
    			'created_at'	=> now(),
    			'updated_at'	=> now(),
    		];

    	}

        DB::table('books')->truncate();
        DB::table('books')->insert($data);
    }
}
