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
        ]);

        // Nếu checkbox không được check thì không có trong request
        $validated['is_active'] = $request->has('is_active');

        CarModel::create($validated);

        return redirect('/admin/carmodels')->with('success', 'Car model added successfully!');
    }

    public function edit($id)
    {
        $carModel = CarModel::findOrFail($id);
        return view('admin.carmodels.edit', compact('carModel'));
    }

    public function update(Request $request, $id)
    {
        $carModel = CarModel::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'base_price' => 'required|numeric',
            'description' => 'nullable|string',
            'image_url' => 'nullable|url',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $carModel->update($validated);

        return redirect('/admin/carmodels')->with('success', 'Car model updated successfully!');
    }

    public function destroy($id)
    {
        $carModel = CarModel::findOrFail($id);
        $carModel->delete();

        return redirect('/admin/carmodels')->with('success', 'Car model deleted successfully!');
    }
}