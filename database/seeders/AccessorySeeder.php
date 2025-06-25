<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Accessory;
use App\Models\Product;

class AccessorySeeder extends Seeder
{
    public function run(): void
    {
        $accessories = [
            [
                'name' => 'Wall Connector',
                'description' => 'Tesla Wall Connector for home charging',
                'price' => 500,
                'img_url' => 'https://digitalassets.tesla.com/tesla-contents/image/upload/f_auto,q_auto/Homepage-Card-Powerwall-Desktop.png',
            ],
            [
                'name' => 'All-Weather Interior Mats',
                'description' => 'Custom-fit mats for all Tesla models',
                'price' => 250,
                'img_url' => 'https://www.mini-vietnam.com/content/dam/MINI/common/common/accessories/F54_INT_Allwetter_Fussmatten_in_Essential_Black_vorne_TN2408522_ID10792_A0204332_p.jpg.asset.1644997443977.jpg',
            ],
            [
                'name' => 'Roof Rack',
                'description' => 'Aerodynamic roof rack for Model 3/Y',
                'price' => 400,
                'img_url' => 'https://digitalassets-shop.tesla.com/image/upload/f_auto,q_auto/v1/content/dam/tesla/teslaweb/homepage/MS_web.jpg',
            ],
            [
                'name' => 'Car Cover',
                'description' => 'Outdoor car cover for Model S/X/3/Y',
                'price' => 350,
                'img_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSbINMmZcpQv9f37unYD7DF-Ts-Uvm8u0yHbQ&s',

            ],
        ];

        foreach ($accessories as $item) {
            $product = Product::create([
                'name' => $item['name'],
                'description' => $item['description'],
                'price' => $item['price'],
                'product_type' => 'accessory',
                'is_active' => true,
            ]);
            Accessory::create([
                'product_id' => $product->id,
                'name' => $item['name'],
                'description' => $item['description'],
                'price' => $item['price'],
                'img_url' => $item['img_url'],
            ]);
        }
    }
}
