@extends('layouts.app')
@section('content')
<div class="container py-8">
    <h1 class="text-2xl font-bold mb-6">Lịch sử đơn hàng phụ kiện</h1>
    <table class="table-auto w-full border mb-8">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2">Mã đơn</th>
                <th class="px-4 py-2">Ngày đặt</th>
                <th class="px-4 py-2">Tổng tiền</th>
                <th class="px-4 py-2">Trạng thái</th>
                <th class="px-4 py-2">Chi tiết</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
                <tr>
                    <td class="px-4 py-2">{{ $order->id }}</td>
                    <td class="px-4 py-2">{{ $order->created_at->format('d/m/Y H:i') }}</td>
                    <td class="px-4 py-2">{{ number_format($order->total_price) }}₫</td>
                    <td class="px-4 py-2">{{ __($order->status) }}</td>
                    <td class="px-4 py-2"><a href="{{ route('orders.show', $order->id) }}" class="text-indigo-600 hover:underline">Xem</a></td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center py-4">Bạn chưa có đơn hàng nào.</td></tr>
            @endforelse
        </tbody>
    </table>
    <a href="/" class="btn btn-secondary">← Về trang chủ</a>
</div>
@endsection
