<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\User;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $userIds = User::pluck('id')->toArray();

        for ($i = 0; $i < 10; $i++) {
            Order::create([
                'user_id' => fake()->randomElement($userIds),
                'name' => fake()->name(),
                'email' => fake()->safeEmail(),
                'phone' => fake()->phoneNumber(),
                'address' => fake()->address(),
                'note' => fake()->optional()->sentence(),
                'total_price' => fake()->numberBetween(5_000_000, 100_000_000),
                'payment_method' => fake()->randomElement(['cod', 'bank_transfer', 'momo']),
                'status' => fake()->randomElement(['pending', 'confirmed', 'shipping', 'delivered', 'cancelled']),
                'created_at' => now()->subDays(rand(1, 30)),
                'updated_at' => now(),
            ]);
        }
    }
}