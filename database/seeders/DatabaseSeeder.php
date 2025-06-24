<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'phone' => '0123456789',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user@example.com',
            'phone' => '0987654321',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        // Seed car models and accessories
        $this->call([
            CarModelSeeder::class,
            AccessorySeeder::class,
        ]);
    }
}
