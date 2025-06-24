<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $type = $request->input('type');

        $query = Product::query();

        if ($search) {
            $query->where('name', 'like', "%$search%");
        }

        if ($type) {
            $query->where('product_type', $type);
        }

        $products = $query->paginate(10);
        return view('admin.products.index', compact('products', 'search', 'type'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image_url' => 'nullable|url',
            'product_type' => 'required|in:car,accessory',
        ]);

        $validated['is_active'] = $request->has('is_active');

        Product::create($validated);
        return redirect('/admin/products')->with('success', 'Thêm sản phẩm thành công!');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|min:3',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image_url' => 'nullable|url',
            'product_type' => 'required|in:car,accessory',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $product->update($validated);
        return redirect('/admin/products')->with('success', 'Cập nhật sản phẩm thành công!');
    }

    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return redirect('/admin/products')->with('success', 'Đã xóa sản phẩm!');
    }
}