@extends('admin.layouts.app')

@section('title', 'Danh sách phiên bản xe')

@section('content')
<div class="bg-white p-6 rounded shadow mx-6 my-6">
    {{-- Tiêu đề --}}
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
            🚙 DANH SÁCH PHIÊN BẢN XE
        </h1>
        <a href="{{ route('admin.carvariants.create') }}">
            <button type="button"
                class="inline-flex items-center gap-2 px-5 py-2 bg-indigo-600 font-semibold rounded-md shadow hover:bg-indigo-700 transition text-white">
                Thêm mới
            </button>
        </a>
    </div>

    {{-- Bảng dữ liệu --}}
    <div class="overflow-x-auto">
        <table class="min-w-full w-full border border-gray-200 text-sm text-left rounded-md shadow-sm">
            <thead class="bg-gray-100 text-gray-700 uppercase text-sm">
                <tr>
                    <th class="px-4 py-3 border-b">#</th>
                    <th class="px-4 py-3 border-b">Tên phiên bản</th>
                    <th class="px-4 py-3 border-b">Mẫu xe</th>
                    <th class="px-4 py-3 border-b text-right">Giá gốc</th>
                    <th class="px-4 py-3 border-b text-center">Trạng thái</th>
                    <th class="px-4 py-3 border-b text-center w-60">Hành động</th>
                </tr>
            </thead>
            <tbody class="text-gray-800">
                @forelse ($variants as $variant)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-3 align-middle">{{ $variant->id }}</td>
                        <td class="px-4 py-3 align-middle truncate max-w-xs">{{ $variant->name }}</td>
                        <td class="px-4 py-3 align-middle">{{ $variant->carModel->name ?? '—' }}</td>
                        <td class="px-4 py-3 text-right align-middle">${{ number_format($variant->base_price, 0, '.', ',') }}</td>
                        <td class="px-4 py-3 text-center align-middle">
                            @if ($variant->is_active)
                                <span class="inline-block px-2 py-1 text-xs font-semibold bg-green-100 text-green-700 rounded">Hiển thị</span>
                            @else
                                <span class="inline-block px-2 py-1 text-xs font-semibold bg-red-100 text-red-700 rounded">Ẩn</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-center align-middle">
                            <div class="flex justify-center gap-3">
                                {{-- Nút sửa --}}
                                <a href="{{ route('admin.carvariants.edit', $variant) }}">
                                    <button type="button"
                                        class="px-4 py-1 text-sm font-medium bg-blue-500 text-white rounded-md hover:bg-blue-600 transition shadow">
                                        Sửa
                                    </button>
                                </a>

                                {{-- Nút xoá --}}
                                <form action="{{ route('admin.carvariants.destroy', $variant) }}" method="POST"
                                      onsubmit="return confirm('Bạn có chắc chắn muốn xoá phiên bản xe này?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-4 py-1 text-sm font-medium bg-red-500 text-white rounded-md hover:bg-red-600 transition shadow">
                                        Xoá
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-4 text-center text-gray-500">Không có phiên bản xe nào.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection