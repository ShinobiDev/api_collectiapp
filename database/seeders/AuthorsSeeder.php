<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Author::create([
            'name' => 'ECHIRO ODA',
            'nationality' => 'JAPONES',
            'birth_date' => '1984-07-31'
        ]);
    }
}
