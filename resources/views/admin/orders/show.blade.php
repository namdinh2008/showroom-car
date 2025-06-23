@extends('admin.layouts.app')

@section('title', 'Chi tiết đơn hàng')

@section('content')
<div class="bg-white p-6 rounded shadow max-w-4xl mx-auto">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">📦 CHI TIẾT ĐƠN HÀNG</h1>

    {{-- Thông tin đơn hàng --}}
    <div class="mb-6">
        <div class="grid grid-cols-2 gap-4 text-sm text-gray-700">
            <div><strong>Họ tên:</strong> {{ $order->name }}</div>
            <div><strong>Email:</strong> {{ $order->email }}</div>
            <div><strong>Số điện thoại:</strong> {{ $order->phone }}</div>
            <div><strong>Địa chỉ:</strong> {{ $order->address }}</div>
            <div><strong>Phương thức thanh toán:</strong> {{ strtoupper($order->payment_method) }}</div>
            <div><strong>Trạng thái:</strong>
                @php
                    $colors = [
                        'pending' => 'bg-yellow-100 text-yellow-800',
                        'processing' => 'bg-blue-100 text-blue-800',
                        'shipped' => 'bg-green-100 text-green-800',
                        'cancelled' => 'bg-red-100 text-red-800',
                    ];
                @endphp
                <span class="inline-block px-2 py-1 text-xs rounded {{ $colors[$order->status] ?? '' }}">
                    {{ ucfirst($order->status) }}
                </span>
            </div>
        </div>
        @if ($order->note)
            <div class="mt-4 text-sm text-gray-600"><strong>Ghi chú:</strong> {{ $order->note }}</div>
        @endif
    </div>

    {{-- Danh sách sản phẩm --}}
    <div class="border-t pt-4">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">🧾 Sản phẩm trong đơn</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm border border-gray-200 rounded shadow-sm">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-4 py-2 border-b">#</th>
                        <th class="px-4 py-2 border-b">Sản phẩm</th>
                        <th class="px-4 py-2 border-b">Hình ảnh</th>
                        <th class="px-4 py-2 border-b text-center">Màu</th>
                        <th class="px-4 py-2 border-b text-center">Số lượng</th>
                        <th class="px-4 py-2 border-b text-right">Đơn giá</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800">
                    @foreach ($order->items as $index => $item)
                        <tr class="border-t">
                            <td class="px-4 py-2 align-middle">{{ $index + 1 }}</td>
                            <td class="px-4 py-2 align-middle">{{ $item->product->name ?? '-' }}</td>
                            <td class="px-4 py-2 align-middle">
                                @if ($item->product->image_url)
                                    <img src="{{ $item->product->image_url }}" alt="" class="w-16 h-16 object-cover rounded">
                                @else
                                    <span class="text-gray-400 italic">Không ảnh</span>
                                @endif
                            </td>
                            <td class="px-4 py-2 align-middle text-center">
                                {{ $item->color->color_name ?? '-' }}
                            </td>
                            <td class="px-4 py-2 align-middle text-center">{{ $item->quantity }}</td>
                            <td class="px-4 py-2 align-middle text-right">
                                {{ number_format($item->price, 0, ',', '.') }} đ
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Tổng tiền --}}
    <div class="text-right mt-6 text-lg font-bold text-gray-800">
        Tổng tiền: {{ number_format($order->total_price, 0, ',', '.') }} đ
    </div>
</div>
@endsection