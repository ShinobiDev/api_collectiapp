<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriesSeeder::class);
        $this->call(GendersSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(TypesSeeder::class);  
        $this->call(UsersSeeder::class);
        $this->call(AuthorsSeeder::class);
        $this->call(EditorialsSeeder::class);
          
    }
}
