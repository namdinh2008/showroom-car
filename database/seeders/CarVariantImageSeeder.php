<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CarVariant;
use App\Models\CarVariantImage;

class CarVariantImageSeeder extends Seeder
{
    public function run(): void
    {
        // Lấy tất cả các variant đã seed
        $variants = CarVariant::all();
        foreach ($variants as $variant) {
            // Seed 2 ảnh cho mỗi variant
            for ($i = 1; $i <= 2; $i++) {
                CarVariantImage::create([
                    'car_variant_id' => $variant->id,
                    'image_url' => 'https://tesla-cdn.thron.com/delivery/public/image/tesla/sample-' . $variant->id . '-' . $i . '.jpg',
                    'is_main' => $i === 1,
                ]);
            }
        }
    }
}
