@if ($errors->any())
    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
        <ul class="list-disc pl-5 text-sm">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@extends('admin.layouts.app')

@section('title', 'Thêm bài viết mới')

@section('content')
<div class="bg-white p-6 rounded shadow max-w-3xl mx-auto">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">📝 THÊM BÀI VIẾT MỚI</h1>

    <form action="{{ route('admin.blogs.store') }}" method="POST">
        @csrf

        {{-- Tiêu đề --}}
        <div class="mb-4">
            <label for="title" class="block text-sm font-semibold text-gray-700 mb-1">Tiêu đề bài viết</label>
            <input type="text" name="title" id="title"
                value="{{ old('title') }}"
                class="w-full border-gray-300 rounded px-4 py-2 shadow-sm focus:outline-none focus:ring focus:ring-indigo-200" required>
        </div>

        {{-- Ảnh --}}
        <div class="mb-4">
            <label for="image_url" class="block text-sm font-semibold text-gray-700 mb-1">URL Hình ảnh</label>
            <input type="url" name="image_url" id="image_url"
                value="{{ old('image_url') }}"
                class="w-full border-gray-300 rounded px-4 py-2 shadow-sm focus:outline-none focus:ring focus:ring-indigo-200">
        </div>

        {{-- Nội dung --}}
        <div class="mb-4">
            <label for="content" class="block text-sm font-semibold text-gray-700 mb-1">Nội dung bài viết</label>
            <textarea name="content" id="content" rows="6"
                class="w-full border-gray-300 rounded px-4 py-2 shadow-sm focus:outline-none focus:ring focus:ring-indigo-200"
                required>{{ old('content') }}</textarea>
        </div>

        {{-- Trạng thái --}}
        <div class="mb-4">
            <label class="inline-flex items-center gap-2">
                <input type="checkbox" name="is_published" class="rounded border-gray-300" {{ old('is_published') ? 'checked' : '' }}>
                <span class="text-sm text-gray-700">Công khai ngay</span>
            </label>
        </div>

        {{-- Nút lưu --}}
        <div class="text-right">
            <button type="submit"
                class="inline-flex items-center gap-2 px-6 py-2 bg-indigo-600 font-semibold text-white rounded-md shadow hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
                Lưu bài viết
            </button>
        </div>
    </form>
</div>
@endsection