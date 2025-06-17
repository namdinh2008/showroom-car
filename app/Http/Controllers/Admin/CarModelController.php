<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CarModel;
use Illuminate\Http\Request;

class CarModelController extends Controller
{
    public function index()
    {
        $carModels = CarModel::all();
        return view('admin.carmodels.index', compact('carModels'));
    }

    public function create()
    {
        return view('admin.carmodels.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'base_price' => 'required|numeric',
            'description' => 'nullable|string',
            'image_url' => 'nullable|url',
            'is_active' => 'boolean',
        ]);

        CarModel::create($validated);

        return redirect()->route('admin.carmodels.index')->with('success', 'Thêm mẫu xe thành công!');
    }

    public function show(CarModel $carModel)
    {
        return view('admin.carmodels.show', compact('carModel'));
    }

    public function edit(CarModel $carModel)
    {
        return view('admin.carmodels.edit', compact('carModel'));
    }

    public function update(Request $request, CarModel $carModel)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'base_price' => 'required|numeric',
            'description' => 'nullable|string',
            'image_url' => 'nullable|url',
            'is_active' => 'boolean',
        ]);

        $carModel->update($validated);

        return redirect()->route('admin.carmodels.index')->with('success', 'Cập nhật mẫu xe thành công!');
    }

    public function destroy(CarModel $carModel)
    {
        $carModel->delete();
        return redirect()->route('admin.carmodels.index')->with('success', 'Đã xoá mẫu xe!');
    }
}