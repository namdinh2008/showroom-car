@extends('admin.layouts.app')

@section('title', 'Thêm phiên bản xe')

@section('content')
<div class="bg-white p-6 rounded shadow max-w-3xl mx-auto">
    <h1 class="text-2xl font-bold mb-6">➕ THÊM PHIÊN BẢN XE</h1>

    <form action="{{ route('admin.carvariants.store') }}" method="POST">
        @csrf

        {{-- Mẫu xe --}}
        <div class="mb-4">
            <label for="car_model_id" class="block font-semibold mb-1">Mẫu xe</label>
            <select name="car_model_id" required class="w-full border rounded px-4 py-2">
                <option value="">-- Chọn mẫu xe --</option>
                @foreach ($carModels as $model)
                    <option value="{{ $model->id }}" {{ old('car_model_id') == $model->id ? 'selected' : '' }}>
                        {{ $model->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Tên + Giá --}}
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block font-semibold mb-1">Tên phiên bản</label>
                <input name="name" value="{{ old('name') }}" required class="w-full border rounded px-4 py-2" />
            </div>
            <div>
                <label class="block font-semibold mb-1">Giá (VNĐ)</label>
                <input name="price" type="number" value="{{ old('price', 0) }}" required class="w-full border rounded px-4 py-2" />
            </div>
        </div>

        {{-- Mô tả + Tính năng --}}
        <div class="mt-4">
            <label class="block font-semibold mb-1">Mô tả</label>
            <textarea name="description" rows="3" class="w-full border rounded px-4 py-2">{{ old('description') }}</textarea>
        </div>

        <div class="mt-4">
            <label class="block font-semibold mb-1">Tính năng</label>
            <textarea name="features" rows="3" class="w-full border rounded px-4 py-2">{{ old('features') }}</textarea>
        </div>

        {{-- Trạng thái --}}
        <div class="mt-4 flex items-center gap-2">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active') ? 'checked' : '' }}>
            <label>Hiển thị</label>
        </div>

        <div class="mt-6 text-right">
            <button class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">Lưu</button>
        </div>
    </form>
</div>
@endsection