@extends('layouts.app')
@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded shadow mt-8">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Thanh toán đơn hàng</h1>
    <form action="{{ route('checkout.process') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-sm font-semibold mb-1">Họ và tên</label>
            <input type="text" name="name" value="{{ old('name', Auth::user()->name ?? '') }}" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-semibold mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email', Auth::user()->email ?? '') }}" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-semibold mb-1">Số điện thoại</label>
            <input type="text" name="phone" value="{{ old('phone', Auth::user()->phone ?? '') }}" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-semibold mb-1">Địa chỉ giao hàng</label>
            <input type="text" name="address" value="{{ old('address', Auth::user()->address ?? '') }}" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-semibold mb-1">Phương thức thanh toán</label>
            <select name="payment_method" class="w-full border rounded px-3 py-2" required>
                <option value="cod">Thanh toán khi nhận hàng (COD)</option>
                <option value="bank">Chuyển khoản ngân hàng</option>
                <option value="online">Thanh toán online (VNPay, Momo...)</option>
            </select>
        </div>
        <div class="mb-6">
            <h2 class="text-lg font-semibold mb-2">Tóm tắt đơn hàng</h2>
            <ul class="mb-2">
                @foreach($cartItems as $item)
                    <li class="flex justify-between border-b py-1">
                        <span>{{ $item->accessory->name }} x {{ $item->quantity }}</span>
                        <span>{{ number_format($item->accessory->price * $item->quantity, 0, ',', '.') }}₫</span>
                    </li>
                @endforeach
            </ul>
            <div class="flex justify-between font-bold text-lg">
                <span>Tổng cộng:</span>
                <span>{{ number_format($total, 0, ',', '.') }}₫</span>
            </div>
        </div>
        <div class="flex justify-end gap-2 mt-6">
            <a href="/cart" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Quay lại giỏ hàng</a>
            <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 font-semibold">Thanh toán</button>
        </div>
    </form>
</div>
@endsection
