<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Accessory;
use Illuminate\Http\Request;

class AccessoryController extends Controller
{
    public function index()
    {
        $accessories = Accessory::all();
        return view('admin.accessories.index', compact('accessories'));
    }

    public function create()
    {
        return view('admin.accessories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category' => 'required',
            'image_url' => 'nullable|url',
        ]);
        Accessory::create($data);
        return redirect()->route('admin.accessories.index')->with('success', 'Đã thêm phụ kiện!');
    }

    public function edit($id)
    {
        $accessory = Accessory::findOrFail($id);
        return view('admin.accessories.edit', compact('accessory'));
    }

    public function update(Request $request, $id)
    {
        $accessory = Accessory::findOrFail($id);
        $data = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category' => 'required',
            'image_url' => 'nullable|url',
        ]);
        $accessory->update($data);
        return redirect()->route('admin.accessories.index')->with('success', 'Đã cập nhật phụ kiện!');
    }

    public function destroy($id)
    {
        $accessory = Accessory::findOrFail($id);
        $accessory->delete();
        return redirect()->route('admin.accessories.index')->with('success', 'Đã xoá phụ kiện!');
    }
}
