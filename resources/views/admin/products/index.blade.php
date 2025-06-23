@extends('admin.layouts.app')

@section('title', 'Danh sách sản phẩm')

@section('content')
<div class="bg-white p-6 rounded shadow mx-6 my-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
            📦 DANH SÁCH SẢN PHẨM
        </h1>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full w-full border border-gray-200 text-sm text-left rounded-md shadow-sm">
            <thead class="bg-gray-100 text-gray-700 uppercase text-sm">
                <tr>
                    <th class="px-4 py-3 border-b">#</th>
                    <th class="px-4 py-3 border-b">Tên</th>
                    <th class="px-4 py-3 border-b">Loại</th>
                    <th class="px-4 py-3 border-b">Giá</th>
                    <th class="px-4 py-3 border-b text-center">Trạng thái</th>
                </tr>
            </thead>
            <tbody class="text-gray-800">
                @forelse ($products as $product)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-3 align-middle">{{ $product->id }}</td>
                        <td class="px-4 py-3 align-middle">{{ $product->name }}</td>
                        <td class="px-4 py-3 align-middle capitalize">{{ $product->product_type }}</td>
                        <td class="px-4 py-3 align-middle">{{ number_format($product->price, 0, ',', '.') }} đ</td>
                        <td class="px-4 py-3 text-center align-middle">
                            @if ($product->is_active)
                                <span class="inline-block px-2 py-1 text-xs font-semibold bg-green-100 text-green-700 rounded">Hiển thị</span>
                            @else
                                <span class="inline-block px-2 py-1 text-xs font-semibold bg-red-100 text-red-700 rounded">Ẩn</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-4 text-center text-gray-500">Không có sản phẩm nào.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection