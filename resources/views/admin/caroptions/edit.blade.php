@extends('layouts.admin')

@section('title', 'Edit Configuration Option')

@section('content')
<div class="bg-white p-6 rounded shadow max-w-3xl mx-auto">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">✏️ EDIT CONFIGURATION OPTION</h1>

    <form action="{{ route('admin.caroptions.update', ['caroption' => $carOption->id]) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Car Model (Readonly) --}}
        <div class="mb-4">
            <label for="car_model" class="block text-sm font-semibold text-gray-700 mb-1">Car model</label>
            <input type="text" id="car_model" value="{{ $carOption->carModel->name }}" disabled
                class="w-full bg-gray-100 border-gray-300 rounded px-4 py-2 shadow-sm">
        </div>

        {{-- Option Type --}}
        <div class="mb-4">
            <label for="option_type" class="block text-sm font-semibold text-gray-700 mb-1">Option type</label>
            <input type="text" id="option_type" name="option_type" value="{{ old('option_type', $carOption->option_type) }}"
                class="w-full border-gray-300 rounded px-4 py-2 shadow-sm focus:outline-none focus:ring focus:ring-indigo-200"
                required>
        </div>

        {{-- Option Name --}}
        <div class="mb-4">
            <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Option name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $carOption->name) }}"
                class="w-full border-gray-300 rounded px-4 py-2 shadow-sm focus:outline-none focus:ring focus:ring-indigo-200"
                required>
        </div>

        {{-- Price Adjustment --}}
        <div class="mb-4">
            <label for="price_adjustment" class="block text-sm font-semibold text-gray-700 mb-1">Price adjustment</label>
            <input type="number" id="price_adjustment" name="price_adjustment"
                value="{{ old('price_adjustment', $carOption->price_adjustment) }}"
                class="w-full border-gray-300 rounded px-4 py-2 shadow-sm focus:outline-none focus:ring focus:ring-indigo-200">
        </div>

        {{-- Image URL --}}
        <div class="mb-4">
            <label for="image_url" class="block text-sm font-semibold text-gray-700 mb-1">Image URL</label>
            <input type="url" id="image_url" name="image_url"
                value="{{ old('image_url', $carOption->image_url) }}"
                class="w-full border-gray-300 rounded px-4 py-2 shadow-sm focus:outline-none focus:ring focus:ring-indigo-200">
        </div>

        {{-- Status --}}
        <div class="mb-4 flex items-center gap-3">
            <input type="checkbox" id="is_active" name="is_active" value="1"
                {{ old('is_active', $carOption->is_active) ? 'checked' : '' }}
                class="text-indigo-600 rounded">
            <label for="is_active" class="text-sm text-gray-700">Active</label>
        </div>

        {{-- Submit Button --}}
        <div class="text-right">
            <button type="submit"
                class="inline-flex items-center gap-2 px-6 py-2 bg-indigo-600 font-semibold rounded-md shadow hover:bg-indigo-700 transition">
                Update option
            </button>
        </div>
    </form>
</div>
@endsection