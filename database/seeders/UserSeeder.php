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
            'name'      => 'Admin',
            'email'     => 'admin@example.com',
            'password'  => Hash::make('password123'), // Ganti password sesukamu
            'nik'       => '1234567890123456',
            'role'      => 'admin',
        ]);

        // Data Operator
        User::create([
            'name'      => 'Operator',
            'email'     => 'operator@example.com',
            'password'  => Hash::make('password123'),
            'nik'       => '9876543210987654',
            'role'      => 'operator',
        ]);

        User::create([
            'name'      => 'User',
            'email'     => 'user@example.com',
            'password'  => Hash::make('password123'),
            'nik'       => '1234567887654321',
        ]);
    }
}
