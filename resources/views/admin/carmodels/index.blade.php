@extends('layouts.admin')

@section('title', 'Danh sách Mẫu xe')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold text-gray-800">📋 Danh sách Mẫu xe</h1>
        <a href="{{ route('admin.carmodels.create') }}" class="inline-flex items-center bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
            ➕ <span class="ml-1">Thêm mới</span>
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full table-auto border border-gray-200 text-sm text-left">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-2">#</th>
                    <th class="px-4 py-2">Tên mẫu xe</th>
                    <th class="px-4 py-2 text-right">Giá cơ bản</th>
                    <th class="px-4 py-2 text-center">Trạng thái</th>
                    <th class="px-4 py-2 text-center w-40">Thao tác</th>
                </tr>
            </thead>
            <tbody class="text-gray-800">
                @forelse ($carModels as $model)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-2 align-middle">{{ $model->id }}</td>
                        <td class="px-4 py-2 align-middle">{{ $model->name }}</td>
                        <td class="px-4 py-2 text-right align-middle">${{ number_format($model->base_price, 0, '.', ',') }}</td>
                        <td class="px-4 py-2 text-center align-middle">
                            @if ($model->is_active)
                                <span class="inline-block px-2 py-1 text-xs font-semibold bg-green-100 text-green-700 rounded">Hiển thị</span>
                            @else
                                <span class="inline-block px-2 py-1 text-xs font-semibold bg-red-100 text-red-700 rounded">Ẩn</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 text-center align-middle">
                            <div class="flex items-center justify-center gap-3">
                                <a href="{{ route('admin.carmodels.edit', $model) }}" class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-700 text-xs font-medium rounded hover:bg-blue-200">
                                    ✏️ Sửa
                                </a>
                                <form method="POST" action="{{ route('admin.carmodels.destroy', $model) }}" onsubmit="return confirm('Bạn chắc chắn muốn xoá?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center px-3 py-1 bg-red-100 text-red-700 text-xs font-medium rounded hover:bg-red-200">
                                        🗑️ Xoá
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-4 text-center text-gray-500">Chưa có mẫu xe nào.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection