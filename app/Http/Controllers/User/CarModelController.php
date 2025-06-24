<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CarModel;
use Illuminate\Http\Request;

class CarModelController extends Controller
{
    public function show($id)
    {
        $carModel = CarModel::with([
            'variants.product',
            'variants.colors',
            'variants.images',
            'images',
        ])->findOrFail($id);

        // Lấy các phiên bản, màu sắc, option, gallery...
        $variants = $carModel->variants;
        $gallery = $carModel->images->pluck('image_url')->toArray();

        return view('user.car_model_detail', [
            'carModel' => $carModel,
            'variants' => $variants,
            'gallery' => $gallery,
        ]);
    }
}
