<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CarOrder;
use App\Models\User;
use App\Models\CarModel;
use Illuminate\Http\Request;

class CarOrderController extends Controller
{
    public function index()
    {
        $orders = CarOrder::with(['user', 'carModel'])->get();
        return view('admin.carorders.index', compact('orders'));
    }

    public function create()
    {
        $users = User::all();
        $carModels = CarModel::all();
        return view('admin.carorders.create', compact('users', 'carModels'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'car_model_id' => 'required|exists:car_models,id',
            'total_price' => 'required|numeric|min:0',
            'status' => 'required|in:pending,confirmed,canceled',
        ]);

        CarOrder::create($validated);

        return redirect()->route('admin.carorders.index')->with('success', 'Car order created successfully!');
    }

    public function edit(CarOrder $carorder)
    {
        $users = User::all();
        $carModels = CarModel::all();
        return view('admin.carorders.edit', compact('carorder', 'users', 'carModels'));
    }

    public function update(Request $request, CarOrder $carorder)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'car_model_id' => 'required|exists:car_models,id',
            'total_price' => 'required|numeric|min:0',
            'status' => 'required|in:pending,confirmed,canceled',
        ]);

        $carorder->update($validated);

        return redirect()->route('admin.carorders.index')->with('success', 'Car order updated successfully!');
    }
}