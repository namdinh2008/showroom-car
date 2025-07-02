<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $query = Car::query();

        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $cars = $query->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.cars.index', compact('cars'));
    }

    public function create()
    {
        return view('admin.cars.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'country' => 'nullable|string|max:100',
            'description' => 'nullable|string',
        ]);

        $data = $request->only(['name', 'country', 'description']);

        if ($request->hasFile('logo_path')) {
            $file = $request->file('logo_path');
            $path = $file->store('uploads/cars', 'public');
            $data['logo_path'] = $path;
        }

        Car::create($data);
        return redirect()->route('admin.cars.index')->with('success', 'Thêm hãng xe thành công!');
    }

    public function edit(Car $car)
    {
        return view('admin.cars.edit', compact('car'));
    }

    public function update(Request $request, Car $car)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'country' => 'nullable|string|max:100',
            'description' => 'nullable|string',
        ]);

        $data = $request->only(['name', 'country', 'description']);

        if ($request->hasFile('logo_path')) {
            // xoá ảnh cũ nếu có
            if ($car->logo_path && \Storage::disk('public')->exists($car->logo_path)) {
                \Storage::disk('public')->delete($car->logo_path);
            }

            // lưu ảnh mới
            $file = $request->file('logo_path');
            $path = $file->store('uploads/cars', 'public');
            $data['logo_path'] = $path;
        }


        $car->update($data);
        return redirect()->route('admin.cars.index')->with('success', 'Cập nhật hãng xe thành công!');
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('admin.cars.index')->with('success', 'Xoá hãng xe thành công!');
    }
}