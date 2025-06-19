@extends('layouts.admin')

@section('title', 'Add Configuration Option')

@section('content')
<div class="bg-white p-6 rounded shadow max-w-3xl mx-auto">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">ADD CONFIGURATION OPTION</h1>
    <form action="{{ route('admin.caroptions.store') }}" method="POST">
        @csrf

        {{-- Car model --}}
        <div class="mb-4">
            <label for="car_model_id" class="block text-sm font-semibold text-gray-700 mb-1">Car Model</label>
            <select name="car_model_id" id="car_model_id" required
                class="w-full border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:ring-indigo-200">
                @foreach ($carModels as $carModel)
                    <option value="{{ $carModel->id }}">{{ $carModel->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Option Type --}}
        <div class="mb-4">
            <label for="option_name" class="block text-sm font-semibold text-gray-700 mb-1">Option Type</label>
            <input type="text" id="option_type" name="option_type" value="{{ old('option_type') }}"
                class="w-full border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:ring-indigo-200"
                required>
        </div>

        {{-- Name --}}
        <div class="mb-4">
            <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Option Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}"
                class="w-full border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:ring-indigo-200"
                required>
        </div>

        {{-- Price --}}
        <div class="mb-4">
            <label for="price_adjustment" class="block text-sm font-semibold text-gray-700 mb-1">Price Adjustment</label>
            <input type="number" id="price_adjustment" name="price_adjustment" value="{{ old('price_adjustment') }}"
                class="w-full border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:ring-indigo-200">
        </div>

        {{-- Image --}}
        <div class="mb-4">
            <label for="image_url" class="block text-sm font-semibold text-gray-700 mb-1">Image URL</label>
            <input type="url" id="image_url" name="image_url" value="{{ old('image_url') }}"
                class="w-full border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:ring-indigo-200">
        </div>

        {{-- Submit --}}
        <div class="text-right">
            <button type="submit"
                class="inline-flex items-center gap-2 px-6 py-2 bg-indigo-600 font-semibold rounded-md shadow hover:bg-indigo-700 transition">
                ADD NEW
            </button>
        </div>
    </form>
</div>
@endsection