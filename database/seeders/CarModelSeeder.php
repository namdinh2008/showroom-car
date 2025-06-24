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
                'image_url' => 'https://i.pinimg.com/736x/42/82/37/428237ad7f8581c887d716f82706c4f7.jpg',
            ],
            [
                'name' => 'Model 3',
                'description' => 'Tesla Model 3 - Affordable all-electric sedan',
                'image_url' => 'https://i.pinimg.com/736x/c9/4f/de/c94fdeb008bdf6d791cff571154323c9.jpg',
            ],
            [
                'name' => 'Model X',
                'description' => 'Tesla Model X - All-electric SUV with falcon wing doors',
                'image_url' => 'https://i.pinimg.com/736x/9d/9f/c4/9d9fc47209441fb2b3f5b0fd46da283c.jpg',
            ],
            [
                'name' => 'Model Y',
                'description' => 'Tesla Model Y - Versatile all-electric compact SUV',
                'image_url' => 'https://i.pinimg.com/736x/4b/f0/ee/4bf0ee5d3cd36e6d726b33a8b28c3f2f.jpg',
            ],
        ];

        foreach ($models as $model) {
            CarModel::create($model);
        }
    }
}
