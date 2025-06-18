@extends('layouts.app')
@section('content')
<div class="max-w-3xl mx-auto py-10 px-4">
    <h1 class="text-3xl font-bold mb-6">Giỏ hàng phụ kiện</h1>
    @if($cartItems->count() > 0)
        <div class="bg-white rounded-lg shadow p-6 mb-6">
            <table class="w-full text-left">
                <thead>
                    <tr>
                        <th class="pb-2">Sản phẩm</th>
                        <th class="pb-2">Giá</th>
                        <th class="pb-2">Số lượng</th>
                        <th class="pb-2">Thành tiền</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $item)
                        <tr class="border-t">
                            <td class="py-2 flex items-center gap-3">
                                <img src="{{ $item->accessory->image_url }}" alt="{{ $item->accessory->name }}" class="w-16 h-16 rounded object-cover border">
                                <span>{{ $item->accessory->name }}</span>
                            </td>
                            <td>${{ number_format($item->accessory->price) }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>${{ number_format($item->accessory->price * $item->quantity) }}</td>
                            <td>
                                <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Xoá</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-right mt-4 text-xl font-bold">Tổng: ${{ number_format($total) }}</div>
        </div>
        <a href="{{ route('checkout.index') }}" class="px-6 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">Thanh toán</a>
    @else
        <div class="bg-white rounded-lg shadow p-6 text-center text-gray-500">Giỏ hàng của bạn đang trống.</div>
    @endif
</div>
@endsection
