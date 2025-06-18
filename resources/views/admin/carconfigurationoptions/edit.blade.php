@extends('layouts.admin')

@section('title', 'Cập nhật Tuỳ chọn cấu hình')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded shadow">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Cập nhật Tuỳ chọn cấu hình</h1>
    <form action="{{ route('admin.carconfigurationoptions.update', $option->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block text-sm font-semibold mb-1">Tên tuỳ chọn</label>
            <input type="text" name="name" value="{{ old('name', $option->name) }}" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200" required>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-semibold mb-1">Loại tuỳ chọn</label>
            <input type="text" name="option_type" value="{{ old('option_type', $option->option_type) }}" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200" required>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-semibold mb-1">Giá điều chỉnh (VNĐ)</label>
            <input type="number" name="price_adjustment" value="{{ old('price_adjustment', $option->price_adjustment) }}" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200" required>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-semibold mb-1">Link ảnh</label>
            <input type="url" name="image_url" value="{{ old('image_url', $option->image_url) }}" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200">
        </div>
        <div class="mb-4">
            <label class="block text-sm font-semibold mb-1">Chọn mẫu xe</label>
            <select name="car_model_id" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200" required>
                @foreach($carModels as $model)
                    <option value="{{ $model->id }}" {{ $option->car_model_id == $model->id ? 'selected' : '' }}>{{ $model->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex justify-end gap-2 mt-6">
            <a href="{{ route('admin.carconfigurationoptions.index') }}" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Quay lại</a>
            <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 font-semibold">Cập nhật</button>
        </div>
    </form>
</div>
@endsection
