<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker 		= Factory::create('id_ID');

    	for ($i=0; $i < 20; $i++) { 
    		
    		$data[$i]	= [
    			'name'			=> $faker->name,
    			'address'		=> $faker->address,
    			'birth_place'	=> $faker->city,
    			'birth_date'	=> $faker->dateTime($max = 'now', $timezone = 'Asia/Jakarta'),
    			'email'			=> $faker->freeEmail,
    			'phone'			=> $faker->e164PhoneNumber,
    			'created_at'	=> now(),
    			'updated_at'	=> now(),
    		];

    	}

        DB::table('members')->truncate();
        DB::table('members')->insert($data);
    }
}
