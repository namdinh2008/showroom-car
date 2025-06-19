@extends('layouts.admin')

@section('title', 'Create Car Order')

@section('content')
<div class="bg-white p-6 rounded shadow max-w-3xl mx-auto">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">➕ CREATE CAR ORDER</h1>
    <form action="{{ route('admin.carorders.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="user_id" class="block text-sm font-semibold text-gray-700 mb-1">User</label>
            <select name="user_id" id="user_id" required
                    class="w-full border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:ring-indigo-200">
                <option value="">-- Select User --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="car_model_id" class="block text-sm font-semibold text-gray-700 mb-1">Car Model</label>
            <select name="car_model_id" id="car_model_id" required
                    class="w-full border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:ring-indigo-200">
                <option value="">-- Select Car Model --</option>
                @foreach($carModels as $car)
                    <option value="{{ $car->id }}" {{ old('car_model_id') == $car->id ? 'selected' : '' }}>{{ $car->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="total_price" class="block text-sm font-semibold text-gray-700 mb-1">Total Price</label>
            <input type="number" name="total_price" id="total_price" step="0.01" value="{{ old('total_price') }}"
                   class="w-full border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:ring-indigo-200">
        </div>

        <div class="mb-4">
            <label for="status" class="block text-sm font-semibold text-gray-700 mb-1">Status</label>
            <select name="status" id="status" required
                    class="w-full border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:ring-indigo-200">
                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="confirmed" {{ old('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                <option value="canceled" {{ old('status') == 'canceled' ? 'selected' : '' }}>Canceled</option>
            </select>
        </div>

        <div class="text-right">
            <button type="submit"
                    class="inline-flex items-center gap-2 px-6 py-2 bg-indigo-600 font-semibold rounded-md shadow hover:bg-indigo-700 transition">
                Create Order
            </button>
        </div>
    </form>
</div>
@endsection