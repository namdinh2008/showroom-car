<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CarModel;
use App\Models\CarConfigurationOption;
use Illuminate\Http\Request;

class CarConfigurationOptionController extends Controller
{
    public function index()
    {
        $options = CarConfigurationOption::with('carModel')->get();
        return view('admin.caroptions.index', compact('options'));
    }

    public function create()
    {
        $carModels = CarModel::all();
        return view('admin.caroptions.create', compact('carModels'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'car_model_id' => 'required|exists:car_models,id',
            'option_type' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'price_adjustment' => 'nullable|numeric',
            'image_url' => 'nullable|url',
        ]);

        $validated['price_adjustment'] = $validated['price_adjustment'] ?? 0;
        $validated['is_active'] = $request->has('is_active');

        CarConfigurationOption::create($validated);

        return redirect('/admin/car-options')->with('success', 'Configuration option created successfully!');
    }

    public function edit($id)
    {
        $carOption = CarConfigurationOption::with('carModel')->findOrFail($id);
        $carModels = CarModel::all(); // nếu cần chọn lại
        return view('admin.caroptions.edit', compact('carOption', 'carModels'));
    }

    public function update(Request $request, $id)
    {
        $carOption = CarConfigurationOption::findOrFail($id);

        $validated = $request->validate([
            'option_type' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'price_adjustment' => 'nullable|numeric',
            'image_url' => 'nullable|url',
        ]);

        $validated['price_adjustment'] = $validated['price_adjustment'] ?? 0;
        $validated['is_active'] = $request->has('is_active');

        $carOption->update($validated);

        return redirect('/admin/car-options')->with('success', 'Configuration option updated successfully!');
    }

    public function destroy($id)
    {
        $carOption = CarConfigurationOption::findOrFail($id);
        $carOption->delete();

        return redirect('/admin/car-options')->with('success', 'Configuration option deleted successfully!');
    }
}