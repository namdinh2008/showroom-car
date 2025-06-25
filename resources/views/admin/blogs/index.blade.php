@extends('admin.layouts.app')

@section('title', 'Danh sách bài viết')

@section('content')
<div class="bg-white p-6 rounded shadow mx-6 my-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
            📝 DANH SÁCH BÀI VIẾT
        </h1>
        <a href="{{ route('admin.blogs.create') }}"
           class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 font-semibold">Thêm mới</a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full w-full border border-gray-200 text-sm text-left rounded-md shadow-sm">
            <thead class="bg-gray-100 text-gray-700 uppercase text-sm">
                <tr>
                    <th class="px-4 py-3 border-b">#</th>
                    <th class="px-4 py-3 border-b">Tiêu đề</th>
                    <th class="px-4 py-3 border-b">Hình ảnh</th>
                    <th class="px-4 py-3 border-b">Trạng thái</th>
                    <th class="px-4 py-3 border-b">Ngày đăng</th>
                    <th class="px-4 py-3 border-b text-center">Hành động</th>
                </tr>
            </thead>
            <tbody class="text-gray-800">
                @foreach ($blogs as $blog)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-3">{{ $blog->id }}</td>
                        <td class="px-4 py-3">{{ $blog->title }}</td>
                        <td class="px-4 py-3">
                            @if ($blog->image_url)
                                <img src="{{ $blog->image_url }}" class="h-10" alt="Ảnh">
                            @else
                                <span class="text-gray-500 italic">Không có ảnh</span>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            @if ($blog->is_published)
                                <span class="text-green-600 font-semibold">Đã đăng</span>
                            @else
                                <span class="text-red-600 font-semibold">Bản nháp</span>
                            @endif
                        </td>
                        <td class="px-4 py-3">{{ optional($blog->published_at)->format('d/m/Y H:i') }}</td>
                        <td class="px-4 py-3 text-center">
                            <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="text-blue-600 font-semibold hover:underline mr-3">Sửa</a>
                            <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('Xác nhận xoá?')" class="text-red-600 font-semibold hover:underline">Xoá</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection