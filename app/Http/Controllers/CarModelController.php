<?php

namespace App\Http\Controllers;

use App\Models\CarModel;
use Illuminate\Http\Request;

class CarModelController extends Controller
{
    // Hiển thị danh sách các mẫu xe
    public function index()
    {
        $carModels = CarModel::all();
        return view('carmodels.index', compact('carModels'));
    }

    // Hiển thị chi tiết 1 mẫu xe
    public function show($id)
    {
        $carModel = CarModel::findOrFail($id);
        return view('carmodels.show', compact('carModel'));
    }
}
