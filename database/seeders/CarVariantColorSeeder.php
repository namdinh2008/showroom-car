<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CarVariant;
use App\Models\CarVariantColor;

class CarVariantColorSeeder extends Seeder
{
    public function run(): void
    {
        // Lấy tất cả các variant đã seed
        $variants = CarVariant::all();
        $colors = [
            ['Đỏ', 'https://tesla-cdn.thron.com/delivery/public/image/tesla/6e7e2e7e-1e2e-4e2e-8e2e-7e2e2e2e2e2/bvlatuR/std/2880x1800/MS-Red-Main-Hero-Desktop'],
            ['Trắng', 'https://tesla-cdn.thron.com/delivery/public/image/tesla/2e2e2e2e-2e2e-4e2e-8e2e-2e2e2e2e2e2e/bvlatuR/std/2880x1800/MS-White-Main-Hero-Desktop'],
            ['Đen', 'https://tesla-cdn.thron.com/delivery/public/image/tesla/3e3e3e3e-3e3e-4e3e-8e3e-3e3e3e3e3e3e/bvlatuR/std/2880x1800/MS-Black-Main-Hero-Desktop'],
        ];

        foreach ($variants as $variant) {
            foreach ($colors as $color) {
                // Kiểm tra màu đã tồn tại cho variant này chưa
                if (!CarVariantColor::where('car_variant_id', $variant->id)
                    ->where('color_name', $color[0])
                    ->exists()) {

                    CarVariantColor::create([
                        'car_variant_id' => $variant->id,
                        'color_name' => $color[0],
                        'image_url' => $color[1],
                    ]);
                }
            }
        }
    }
}
