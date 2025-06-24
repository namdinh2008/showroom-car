<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CarModel;
use App\Models\CarVariant;
use App\Models\CarVariantColor;
use App\Models\CarVariantImage;
use App\Models\Product;

class CarVariantSeeder extends Seeder
{
    public function run(): void
    {
        // Lấy các model xe đã seed
        $models = CarModel::all();

        foreach ($models as $model) {
            // Seed 2 phiên bản cho mỗi model
            for ($i = 1; $i <= 2; $i++) {
                $variantName = $model->name . ' Phiên bản ' . $i;
                $product = Product::create([
                    'name' => $variantName,
                    'description' => $model->description . ' - Phiên bản ' . $i,
                    'price' => 1000000 * $i + rand(100000, 500000),
                    'product_type' => 'car_variant',
                    'is_active' => true,
                ]);
                $variant = CarVariant::create([
                    'product_id' => $product->id,
                    'car_model_id' => $model->id,
                    'name' => $variantName,
                    'description' => 'Thông số kỹ thuật cho ' . $variantName,
                    'features' => json_encode([
                        'Công suất' => (300 + $i*50) . ' HP',
                        'Tăng tốc 0-100km/h' => (4.0 - $i*0.5) . ' giây',
                        'Quãng đường' => (500 + $i*50) . ' km',
                    ]),
                    'is_active' => true,
                ]);

                // Seed 2 màu cho mỗi variant
                foreach ([['Đỏ', 'https://tesla-cdn.thron.com/delivery/public/image/tesla/6e7e2e7e-1e2e-4e2e-8e2e-7e2e2e2e2e2/bvlatuR/std/2880x1800/MS-Red-Main-Hero-Desktop'], ['Trắng', 'https://tesla-cdn.thron.com/delivery/public/image/tesla/2e2e2e2e-2e2e-4e2e-8e2e-2e2e2e2e2e2e/bvlatuR/std/2880x1800/MS-White-Main-Hero-Desktop']] as $color) {
                    $colorModel = CarVariantColor::create([
                        'car_variant_id' => $variant->id,
                        'color_name' => $color[0],
                        'image_url' => $color[1],
                    ]);
                    // Seed 1 ảnh chính cho mỗi màu
                    CarVariantImage::create([
                        'car_variant_id' => $variant->id,
                        'image_url' => $color[1],
                        'is_main' => true,
                    ]);
                }
            }
        }
    }
}
