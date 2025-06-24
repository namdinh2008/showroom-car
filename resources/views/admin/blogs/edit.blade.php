@extends('admin.layouts.app')

@section('title', 'Chỉnh sửa bài viết')

@section('content')
<div class="bg-white p-6 rounded shadow max-w-3xl mx-auto">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">✏️ CHỈNH SỬA BÀI VIẾT</h1>

    <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block text-sm font-semibold text-gray-700 mb-1">Tiêu đề</label>
            <input type="text" name="title" id="title" value="{{ old('title', $blog->title) }}"
                   class="w-full border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:ring-indigo-200 shadow-sm">
        </div>

        <div class="mb-4">
            <label for="content" class="block text-sm font-semibold text-gray-700 mb-1">Nội dung</label>
            <textarea name="content" id="content" rows="6"
                      class="w-full border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:ring-indigo-200 shadow-sm">{{ old('content', $blog->content) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="image_url" class="block text-sm font-semibold text-gray-700 mb-1">Ảnh đại diện (URL)</label>
            <input type="text" name="image_url" id="image_url" value="{{ old('image_url', $blog->image_url) }}"
                   class="w-full border-gray-300 rounded px-4 py-2">
        </div>

        <div class="mb-4 flex items-center gap-4">
            <label class="flex items-center space-x-2">
                <input type="checkbox" name="is_published" value="1" {{ $blog->is_published ? 'checked' : '' }}>
                <span class="text-sm text-gray-700">Công khai bài viết</span>
            </label>
        </div>

        <div class="text-right">
            <button type="submit"
                    class="inline-flex items-center gap-2 px-6 py-2 bg-indigo-600 font-semibold text-white rounded-md shadow hover:bg-indigo-700">
                Cập nhật
            </button>
        </div>
    </form>
</div>
@endsection