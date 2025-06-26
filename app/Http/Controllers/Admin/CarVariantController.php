<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CarVariant;
use App\Models\CarModel;
use App\Models\Product;
use Illuminate\Http\Request;

class CarVariantController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = CarVariant::with('carModel');

        if ($search) {
            $query->where('name', 'like', "%$search%");
        }

        $variants = $query->paginate(10);
        return view('admin.carvariants.index', compact('variants', 'search'));
    }

    public function create()
    {
        $carModels = CarModel::all();
        return view('admin.carvariants.create', compact('carModels'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'car_model_id' => 'required|exists:car_models,id',
            'name' => 'required|min:3',
            'description' => 'nullable|string',
            'features' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $product = Product::create([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'price' => $validated['price'],
            'product_type' => 'car_variant',
            'is_active' => $validated['is_active'],
        ]);

        $validated['product_id'] = $product->id;

        CarVariant::create($validated);
        return redirect()->route('admin.carvariants.index')->with('success', 'Thêm phiên bản xe thành công!');
    }

    public function edit($id)
    {
        $variant = CarVariant::findOrFail($id);
        $carModels = CarModel::all();
        return view('admin.carvariants.edit', compact('variant', 'carModels'));
    }

    public function update(Request $request, $id)
{
    $variant = CarVariant::findOrFail($id);

    $validated = $request->validate([
        'car_model_id' => 'required|exists:car_models,id',
        'name' => 'required|min:3',
        'description' => 'nullable|string',
        'features' => 'nullable|string',
        'price' => 'required|numeric|min:0',
    ]);

    $validated['is_active'] = $request->has('is_active');

    $product = $variant->product;
    if ($product) {
        $product->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'is_active' => $validated['is_active'],
        ]);
    }

    $variant->update($validated);
    return redirect()->route('admin.carvariants.index')->with('success', 'Cập nhật phiên bản xe thành công!');
}

    public function destroy($id)
    {
        $variant = CarVariant::findOrFail($id);

        $product = $variant->product;
        if ($product) {
            $product->delete();
        }

        $variant->delete();
        return redirect()->route('admin.carvariants.index')->with('success', 'Đã xóa phiên bản xe!');
    }
}