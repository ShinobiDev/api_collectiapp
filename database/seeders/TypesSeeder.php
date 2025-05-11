<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Type::create([
            'name' => 'Terror'
        ]);

        Type::create([
            'name' => 'Acción'
        ]);

        Type::create([
            'name' => 'Comedia'
        ]);

        Type::create([
            'name' => 'Shonen'
        ]);
    }
}
