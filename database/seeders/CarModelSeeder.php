<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CarModel;

class CarModelSeeder extends Seeder
{
    public function run(): void
    {
        $models = [
            [
                'name' => 'Model S',
                'description' => 'Tesla Model S - Luxury all-electric sedan',
                'price' => 89999,
            ],
            [
                'name' => 'Model 3',
                'description' => 'Tesla Model 3 - Affordable all-electric sedan',
                'price' => 42999,
            ],
            [
                'name' => 'Model X',
                'description' => 'Tesla Model X - All-electric SUV with falcon wing doors',
                'price' => 99999,
            ],
            [
                'name' => 'Model Y',
                'description' => 'Tesla Model Y - Versatile all-electric compact SUV',
                'price' => 49999,
            ],
        ];

        foreach ($models as $model) {
            CarModel::create($model);
        }
    }
}
