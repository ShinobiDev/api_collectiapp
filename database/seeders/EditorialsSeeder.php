<?php

namespace Database\Seeders;

use App\Models\Editorial;
use Illuminate\Database\Seeder;

class EditorialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Editorial::create([
            'name' => 'PANINI'
        ]);

        Editorial::create([
            'name' => 'NORMA'
        ]);

        Editorial::create([
            'name' => 'ECC'
        ]);

        Editorial::create([
            'name' => 'PLANETA'
        ]);
    }
}
