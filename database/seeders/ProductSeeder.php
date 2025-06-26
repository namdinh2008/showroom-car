<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Seed thêm một số sản phẩm xe mẫu
        $products = [
            [
                'name' => 'Model S Performance',
                'description' => 'Bản hiệu suất cao của Model S',
                'price' => 2500000,
                'image_url' => 'https://tesla-cdn.thron.com/delivery/public/image/tesla/6e7e2e7e-1e2e-4e2e-8e2e-7e2e2e2e2e2/bvlatuR/std/2880x1800/MS-Red-Main-Hero-Desktop',
                'product_type' => 'car_variant',
                'is_active' => true,
            ],
            [
                'name' => 'Model 3 Standard',
                'description' => 'Bản tiêu chuẩn của Model 3',
                'price' => 1500000,
                'image_url' => 'https://tesla-cdn.thron.com/delivery/public/image/tesla/2e2e2e2e-2e2e-4e2e-8e2e-2e2e2e2e2e2e/bvlatuR/std/2880x1800/MS-White-Main-Hero-Desktop',
                'product_type' => 'car_variant',
                'is_active' => true,
            ],
        ];
        foreach ($products as $item) {
            Product::create($item);
        }
    }
}
