@extends('admin.layouts.app')

@section('title', 'Thêm mẫu xe')

@section('content')
    <div class="bg-white p-6 rounded shadow max-w-3xl mx-auto">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">THÊM MẪU XE MỚI</h1>

        <form action="{{ route('admin.carmodels.store') }}" method="POST">
            @csrf

            {{-- Tên mẫu xe --}}
            <div class="mb-4">
                <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Tên mẫu xe</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}"
                    class="w-full border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:ring-indigo-200 shadow-sm"
                    required>
            </div>

            {{-- Mô tả --}}
            <div class="mb-4">
                <label for="description" class="block text-sm font-semibold text-gray-700 mb-1">Mô tả</label>
                <textarea id="description" name="description" rows="4"
                    class="w-full border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:ring-indigo-200 shadow-sm">{{ old('description') }}</textarea>
            </div>

            {{-- Link ảnh --}}
            <div class="mb-4">
                <label for="image_url" class="block text-sm font-semibold text-gray-700 mb-1">Link hình ảnh</label>
                <input type="url" id="image_url" name="image_url" value="{{ old('image_url') }}"
                    class="w-full border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:ring-indigo-200 shadow-sm">
            </div>

            {{-- Trạng thái --}}
            <div class="mb-4 flex items-center gap-3">
                <input type="checkbox" id="is_active" name="is_active" value="1" class="text-indigo-600 rounded">
                <label for="is_active" class="text-sm text-gray-700">Hiển thị</label>
            </div>

            {{-- Nút lưu --}}
            <div class="text-right">
                <button type="submit"
                    class="inline-flex items-center gap-2 px-6 py-2 bg-indigo-600 font-semibold text-white rounded-md shadow hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
                    Lưu mẫu xe
                </button>
            </div>
        </form>
    </div>
@endsection