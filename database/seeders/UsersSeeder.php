<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Stalin Chacon',
            'email' => 'stalindesarrollador@gmail.com',
            'password' => bcrypt('80793167'),
            'role_id' => '1',
            'status_id' => '1'
        ]);
    }
}
