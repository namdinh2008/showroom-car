@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-6">
    <h1 class="text-xl font-bold mb-4">Chỉnh sửa mẫu xe</h1>
    <form action="{{ route('admin.carmodels.update', $carModel) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-4">
            <label>Tên xe:</label>
            <input type="text" name="name" value="{{ $carModel->name }}" class="w-full border rounded p-2" required>
        </div>
        <div class="mb-4">
            <label>Giá cơ bản:</label>
            <input type="number" name="base_price" value="{{ $carModel->base_price }}" class="w-full border rounded p-2" required>
        </div>
        <div class="mb-4">
            <label>Mô tả:</label>
            <textarea name="description" class="w-full border rounded p-2">{{ $carModel->description }}</textarea>
        </div>
        <div class="mb-4">
            <label>Link ảnh:</label>
            <input type="url" name="image_url" value="{{ $carModel->image_url }}" class="w-full border rounded p-2">
        </div>
        <div class="mb-4">
            <label>
                <input type="checkbox" name="is_active" value="1" {{ $carModel->is_active ? 'checked' : '' }}> Hiển thị
            </label>
        </div>
        <button class="bg-blue-500 text-white px-4 py-2 rounded">Cập nhật</button>
    </form>
</div>
@endsection