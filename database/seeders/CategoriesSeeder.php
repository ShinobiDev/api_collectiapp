<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Comics'
        ]);

        Category::create([
            'name' => 'Libros'
        ]);

        Category::create([
            'name' => 'Novelas'
        ]);

        Category::create([
            'name' => 'Mangas'
        ]);
    }
}
