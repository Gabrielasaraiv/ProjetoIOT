<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Gabriela',
            'email' => 'gabi@senai.com',
            'password' => Hash::make('senha123'),
        ]);

        User::create([
            'name' => 'João Silva',
            'email' => 'joao@senai.com',
            'password' => Hash::make('senha123'),
        ]);

        User::create([
            'name' => 'Maria Santos',
            'email' => 'maria@senai.com',
            'password' => Hash::make('senha123'),
        ]);
    }
}
