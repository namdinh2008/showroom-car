<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\CarModel;
use App\Models\CarConfigurationOption;
use App\Models\Accessory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Tắt kiểm tra khóa ngoại
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // Truncate các bảng theo thứ tự phụ thuộc
        \DB::table('car_configuration_options')->truncate();
        \DB::table('car_orders')->truncate();
        \DB::table('car_order_options')->truncate();
        \DB::table('cart_items')->truncate();
        \DB::table('order_details')->truncate();
        \DB::table('orders')->truncate();
        \DB::table('accessories')->truncate();
        \DB::table('car_models')->truncate();
        \DB::table('users')->truncate();
        // Bật lại kiểm tra khóa ngoại
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Seed admin & user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'User Demo',
            'email' => 'user@example.com',
            'password' => bcrypt('password'),
            'role' => 'user',
        ]);

        // Thêm 10 user mẫu
        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'name' => "User $i",
                'email' => "user$i@example.com",
                'password' => bcrypt('password'),
                'role' => 'user',
            ]);
        }

        // Seed Car Models
        $modelS = CarModel::create([
            'name' => 'Model S',
            'base_price' => 90000,
            'description' => 'Tesla Model S - luxury electric sedan.',
            'image_url' => 'https://tesla-cdn.thron.com/delivery/public/image/tesla/6b7e2e7b-2e7e-4e2e-8e7e-2e7e2e7e2e7e/bvlatuR/std/2880x1800/_25-Hero-D',
            'is_active' => true,
        ]);
        $model3 = CarModel::create([
            'name' => 'Model 3',
            'base_price' => 50000,
            'description' => 'Tesla Model 3 - affordable electric car.',
            'image_url' => 'https://tesla-cdn.thron.com/delivery/public/image/tesla/3b7e2e7b-2e7e-4e2e-8e7e-2e7e2e7e2e7e/bvlatuR/std/2880x1800/_25-Hero-D',
            'is_active' => true,
        ]);

        // Thêm 10 mẫu xe
        $carModels = [];
        for ($i = 1; $i <= 10; $i++) {
            $carModels[$i] = CarModel::create([
                'name' => "Model X$i",
                'base_price' => 40000 + $i * 5000,
                'description' => "Mẫu xe điện X$i với hiệu suất vượt trội.",
                'image_url' => "https://tesla.com/model-x$i.jpg",
                'is_active' => true,
            ]);
        }

        // Seed Car Configuration Options
        CarConfigurationOption::create([
            'car_model_id' => $modelS->id,
            'option_type' => 'Color',
            'name' => 'Red Multi-Coat',
            'price_adjustment' => 2000,
            'image_url' => 'https://tesla-cdn.thron.com/delivery/public/image/tesla/Red_Multi_Coat',
        ]);
        CarConfigurationOption::create([
            'car_model_id' => $modelS->id,
            'option_type' => 'Wheels',
            'name' => '19-inch Wheels',
            'price_adjustment' => 1500,
            'image_url' => 'https://tesla-cdn.thron.com/delivery/public/image/tesla/19_inch_Wheels',
        ]);
        CarConfigurationOption::create([
            'car_model_id' => $model3->id,
            'option_type' => 'Color',
            'name' => 'Pearl White',
            'price_adjustment' => 0,
            'image_url' => 'https://tesla-cdn.thron.com/delivery/public/image/tesla/Pearl_White',
        ]);

        // Thêm 10 option cấu hình xe (mỗi mẫu xe 1 option)
        for ($i = 1; $i <= 10; $i++) {
            CarConfigurationOption::create([
                'car_model_id' => $carModels[$i]->id,
                'option_type' => 'Color',
                'name' => "Color Option $i",
                'price_adjustment' => 1000 * $i,
                'image_url' => "https://tesla.com/color$i.jpg",
            ]);
        }
        for ($i = 1; $i <= 10; $i++) {
            CarConfigurationOption::create([
                'car_model_id' => $carModels[$i]->id,
                'option_type' => 'Wheels',
                'name' => "Wheels Option $i",
                'price_adjustment' => 500 * $i,
                'image_url' => "https://tesla.com/wheels$i.jpg",
            ]);
        }

        // Seed Accessories
        Accessory::create([
            'name' => 'Wall Connector',
            'description' => 'Tesla Wall Connector for home charging.',
            'price' => 500,
            'stock' => 10,
            'category' => 'Charging',
            'image_url' => 'https://shop.tesla.com/image/image.jpg',
        ]);
        Accessory::create([
            'name' => 'All-Weather Floor Mats',
            'description' => 'Durable floor mats for all Tesla models.',
            'price' => 200,
            'stock' => 20,
            'category' => 'Interior',
            'image_url' => 'https://shop.tesla.com/image/floor-mats.jpg',
        ]);

        // Thêm 10 phụ kiện
        for ($i = 1; $i <= 10; $i++) {
            Accessory::create([
                'name' => "Accessory $i",
                'description' => "Phụ kiện Tesla mẫu $i.",
                'price' => 100 * $i,
                'stock' => 10 * $i,
                'category' => $i % 2 == 0 ? 'Interior' : 'Charging',
                'image_url' => "https://tesla.com/accessory$i.jpg",
            ]);
        }
    }
}