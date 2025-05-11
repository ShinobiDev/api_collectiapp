<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GendersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gender::create([
            'name' => 'Terror'
        ]);

        Gender::create([
            'name' => 'Acción'
        ]);

        Gender::create([
            'name' => 'Comedia'
        ]);

        Gender::create([
            'name' => 'Shonen'
        ]);
    }
}
