<?php

namespace App\Http\Controllers;

use App\Models\CarModel;
use App\Models\CarConfigurationOption;
use Illuminate\Http\Request;

class CarOrderController extends Controller
{
    // Bước 1: Chọn cấu hình xe
    public function create($carModelId)
    {
        $carModel = CarModel::findOrFail($carModelId);
        $options = $carModel->configurationOptions;
        return view('carorders.create', compact('carModel', 'options'));
    }

    // Bước 2: Xử lý đặt trước (demo, chỉ validate và show lại dữ liệu)
    public function store(Request $request, $carModelId)
    {
        $carModel = CarModel::findOrFail($carModelId);
        $options = $carModel->configurationOptions;
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'options' => 'array',
        ]);
        // Tính giá tạm tính
        $total = $carModel->base_price;
        $selectedOptions = [];
        if (!empty($data['options'])) {
            foreach ($options as $option) {
                if (in_array($option->id, $data['options'])) {
                    $total += $option->price_adjustment;
                    $selectedOptions[] = $option;
                }
            }
        }
        return view('carorders.confirm', compact('carModel', 'selectedOptions', 'total', 'data'));
    }
}
