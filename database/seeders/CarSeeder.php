<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;

class CarSeeder extends Seeder
{
    public function run(): void
    {
        $cars = [
            [
                'name' => 'Tesla',
                'country' => 'USA',
                'description' => 'Tesla, Inc. is an American electric vehicle and clean energy company.',
                'logo_path' => 'https://logoeps.com/wp-content/uploads/2013/03/tesla-vector-logo.png',
            ],
            [
                'name' => 'BMW',
                'country' => 'Germany',
                'description' => 'Bayerische Motoren Werke AG is a German multinational corporation producing luxury vehicles.',
                'logo_path' => 'https://logoeps.com/wp-content/uploads/2013/03/bmw-vector-logo.png',
            ],
            [
                'name' => 'Mercedes-Benz',
                'country' => 'Germany',
                'description' => 'Mercedes-Benz is a German luxury automotive brand.',
                'logo_path' => 'https://logoeps.com/wp-content/uploads/2013/03/mercedes-benz-vector-logo.png',
            ],
            [
                'name' => 'Audi',
                'country' => 'Germany',
                'description' => 'Audi AG is a German automotive manufacturer of luxury vehicles.',
                'logo_path' => 'https://logoeps.com/wp-content/uploads/2013/03/audi-vector-logo.png',
            ],
        ];

        foreach ($cars as $car) {
            Car::create($car);
        }
    }
}
