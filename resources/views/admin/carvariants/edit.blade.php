@extends('admin.layouts.app')

@section('title', 'Chỉnh sửa phiên bản xe')

@section('content')
<div class="bg-white p-6 rounded shadow max-w-3xl mx-auto">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">✏️ CẬP NHẬT PHIÊN BẢN XE</h1>
    <form action="{{ route('admin.carvariants.update', $variant->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Thuộc mẫu xe --}}
        <div class="mb-4">
            <label for="car_model_id" class="block text-sm font-semibold text-gray-700 mb-1">Chọn mẫu xe</label>
            <select id="car_model_id" name="car_model_id" required
                class="w-full border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:ring-indigo-200 shadow-sm">
                <option value="">-- Chọn mẫu xe --</option>
                @foreach ($carModels as $model)
                    <option value="{{ $model->id }}" {{ old('car_model_id', $variant->car_model_id) == $model->id ? 'selected' : '' }}>
                        {{ $model->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Tên phiên bản --}}
        <div class="mb-4">
            <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Tên phiên bản</label>
            <input type="text" id="name" name="name" value="{{ old('name', $variant->name) }}"
                class="w-full border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:ring-indigo-200 shadow-sm" required>
        </div>

        {{-- Mô tả --}}
        <div class="mb-4">
            <label for="description" class="block text-sm font-semibold text-gray-700 mb-1">Mô tả</label>
            <textarea id="description" name="description" rows="4"
                class="w-full border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:ring-indigo-200 shadow-sm">{{ old('description', $variant->description) }}</textarea>
        </div>

        {{-- Tính năng --}}
        <div class="mb-4">
            <label for="features" class="block text-sm font-semibold text-gray-700 mb-1">Tính năng</label>
            <textarea id="features" name="features" rows="4"
                class="w-full border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:ring-indigo-200 shadow-sm">{{ old('features', $variant->features) }}</textarea>
        </div>

        {{-- Trạng thái --}}
        <div class="mb-4 flex items-center gap-3">
            <input type="checkbox" id="is_active" name="is_active" value="1" class="text-indigo-600 rounded"
                {{ old('is_active', $variant->is_active) ? 'checked' : '' }}>
            <label for="is_active" class="text-sm text-gray-700">Hiển thị</label>
        </div>

        {{-- Nút cập nhật --}}
        <div class="text-right">
            <button type="submit"
                class="inline-flex items-center gap-2 px-6 py-2 bg-indigo-600 font-semibold text-white rounded-md shadow hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
                Cập nhật phiên bản
            </button>
        </div>
    </form>
</div>
@endsection