<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CarModel;
use Illuminate\Http\Request;

class CarModelController extends Controller
{
    // Danh sách mẫu xe với tìm kiếm
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = CarModel::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $carModels = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.carmodels.index', compact('carModels', 'search'));
    }

    // Hiển thị form thêm mẫu xe
    public function create()
    {
        return view('admin.carmodels.create');
    }

    // Lưu mẫu xe mới
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'description' => 'nullable|string',
            'image_url' => 'nullable|url',
        ]);

        $validated['is_active'] = $request->has('is_active');

        CarModel::create($validated);

        return redirect()->route('admin.carmodels.index')->with('success', 'Thêm mẫu xe thành công!');
    }

    // Form chỉnh sửa
    public function edit($id)
    {
        $carModel = CarModel::findOrFail($id);

        return view('admin.carmodels.edit', compact('carModel'));
    }

    // Cập nhật mẫu xe
    public function update(Request $request, $id)
    {
        $carModel = CarModel::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|min:3',
            'description' => 'nullable|string',
            'image_url' => 'nullable|url',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $carModel->update($validated);

        return redirect()->route('admin.carmodels.index')->with('success', 'Cập nhật mẫu xe thành công!');
    }

    // Xóa mẫu xe
    public function destroy($id)
    {
        $carModel = CarModel::findOrFail($id);
        $carModel->delete();

        return redirect()->route('admin.carmodels.index')->with('success', 'Đã xóa mẫu xe!');
    }
}