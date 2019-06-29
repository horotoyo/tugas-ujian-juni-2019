<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        
        $this->call(CategoriesTableSeeder::class);
        $this->call(MembersTableSeeder::class);
        $this->call(BooksTableSeeder::class);
        
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
