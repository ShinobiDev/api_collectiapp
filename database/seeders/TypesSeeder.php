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
            'name' => 'Documentos'
        ]);

        Type::create([
            'name' => 'Cedula Ciudadania',
            'parent_type_id' => 1
        ]);

        Type::create([
            'name' => 'Cedula Extrajeria',
            'parent_type_id' => 1
        ]);

        Type::create([
            'name' => 'Tarjeta Identidad',
            'parent_type_id' => 1
        ]);

        Type::create([
            'name' => 'Passaporte',
            'parent_type_id' => 1
        ]);

        Type::create([
            'name' => 'Colletiones'
        ]);

        Type::create([
            'name' => 'Especial',
            'parent_type_id' => 6
        ]);

        Type::create([
            'name' => 'Regular',
            'parent_type_id' => 6
        ]);
    }
}
