<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Accessory;

class AccessoryController extends Controller
{
    public function index()
    {
        $accessories = Accessory::with('product')->latest()->get();
        return view('admin.accessories.index', compact('accessories'));
    }

    public function create()
    {
        return view('admin.accessories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image_url' => 'nullable|url',
        ]);

        $validated['product_type'] = 'accessory';
        $validated['is_active'] = $request->has('is_active');

        $product = Product::create($validated);

        Accessory::create([
            'product_id' => $product->id,
        ]);

        return redirect()->route('admin.accessories.index')->with('success', 'Thêm phụ kiện thành công!');
    }

    public function edit($id)
    {
        $accessory = Product::findOrFail($id);
        return view('admin.accessories.edit', compact('accessory'));
    }

    public function update(Request $request, $id)
    {
        $accessory = Accessory::findOrFail($id);
        $product = $accessory->product;

        $validated = $request->validate([
            'name' => 'required|string|min:3',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image_url' => 'nullable|url',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $product->update($validated);

        return redirect()->route('admin.accessories.index')->with('success', 'Cập nhật phụ kiện thành công!');
    }

    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->route('admin.accessories.index')->with('success', 'Xoá phụ kiện thành công!');
    }
}
