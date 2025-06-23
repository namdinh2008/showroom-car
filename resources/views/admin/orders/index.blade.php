@extends('admin.layouts.app')

@section('title', 'Danh sách đơn hàng')

@section('content')
<div class="bg-white p-6 rounded shadow mx-6 my-6">
    {{-- Tiêu đề --}}
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
            🧾 DANH SÁCH ĐƠN HÀNG
        </h1>
    </div>

    {{-- Bảng dữ liệu --}}
    <div class="overflow-x-auto">
        <table class="min-w-full w-full border border-gray-200 text-sm text-left rounded-md shadow-sm">
            <thead class="bg-gray-100 text-gray-700 uppercase text-sm">
                <tr>
                    <th class="px-4 py-3 border-b">#</th>
                    <th class="px-4 py-3 border-b">Khách hàng</th>
                    <th class="px-4 py-3 border-b">Số điện thoại</th>
                    <th class="px-4 py-3 border-b">Tổng tiền</th>
                    <th class="px-4 py-3 border-b">Trạng thái</th>
                    <th class="px-4 py-3 border-b text-center">Ngày tạo</th>
                    <th class="px-4 py-3 border-b text-center w-60">Hành động</th>
                </tr>
            </thead>
            <tbody class="text-gray-800">
                @forelse ($orders as $order)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-3 align-middle">{{ $order->id }}</td>
                        <td class="px-4 py-3 align-middle">{{ $order->name }}</td>
                        <td class="px-4 py-3 align-middle">{{ $order->phone }}</td>
                        <td class="px-4 py-3 align-middle">{{ number_format($order->total_price, 0, ',', '.') }} đ</td>
                        <td class="px-4 py-3 align-middle">
                            <span class="inline-block px-2 py-1 text-xs font-semibold rounded 
                                {{ $order->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                {{ $order->status === 'confirmed' ? 'bg-blue-100 text-blue-800' : '' }}
                                {{ $order->status === 'shipping' ? 'bg-purple-100 text-purple-800' : '' }}
                                {{ $order->status === 'delivered' ? 'bg-green-100 text-green-800' : '' }}
                                {{ $order->status === 'cancelled' ? 'bg-red-100 text-red-800' : '' }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-center align-middle">
                            {{ $order->created_at->format('d/m/Y H:i') }}
                        </td>
                        <td class="px-4 py-3 text-center align-middle">
                            <div class="flex justify-center gap-2">
                                {{-- Nút xem --}}
                                <a href="{{ route('admin.orders.show', $order->id) }}">
                                    <button type="button"
                                        class="px-3 py-1 text-sm font-medium bg-gray-500 text-white rounded hover:bg-gray-600 transition">
                                        Xem
                                    </button>
                                </a>

                                {{-- Nút sửa --}}
                                <a href="{{ route('admin.orders.edit', $order->id) }}">
                                    <button type="button"
                                        class="px-3 py-1 text-sm font-medium bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                                        Sửa
                                    </button>
                                </a>

                                {{-- Nút xoá --}}
                                <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST"
                                      onsubmit="return confirm('Bạn có chắc chắn muốn xoá đơn hàng này?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-1 text-sm font-medium bg-red-500 text-white rounded hover:bg-red-600 transition">
                                        Xoá
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-4 text-center text-gray-500">Không có đơn hàng nào.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection