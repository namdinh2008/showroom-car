@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto px-6 py-12 pt-24">
    <h2 class="text-3xl md:text-4xl font-extrabold mb-8 text-center text-gray-900 tracking-tight">
        <i class="fas fa-credit-card mr-2 text-indigo-700"></i>Thanh toán đơn hàng
    </h2>
    @if ($errors->any())
        <div class="mb-6 px-4 py-3 rounded bg-red-100 text-red-700 font-semibold shadow">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('cart.checkout') }}" method="POST" class="space-y-6 bg-white rounded-xl shadow-lg p-8">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block font-semibold mb-1 text-gray-700">Số điện thoại <span class="text-red-500">*</span></label>
                <input type="text" name="phone" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:border-indigo-400 transition" required value="{{ old('phone', $user->phone ?? '') }}">
            </div>
            <div>
                <label class="block font-semibold mb-1 text-gray-700">Họ và tên <span class="text-red-500">*</span></label>
                <input type="text" name="name" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:border-indigo-400 transition" required value="{{ old('name', $user->name ?? '') }}">
            </div>
            <div>
                <label class="block font-semibold mb-1 text-gray-700">Email</label>
                <input type="email" name="email" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:border-indigo-400 transition" value="{{ old('email', $user->email ?? '') }}">
            </div>
            <div>
                <label class="block font-semibold mb-1 text-gray-700">Địa chỉ <span class="text-red-500">*</span></label>
                <input type="text" name="address" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:border-indigo-400 transition" required value="{{ old('address', $user->address ?? '') }}">
            </div>
        </div>
        <div>
            <label class="block font-semibold mb-1 text-gray-700">Ghi chú</label>
            <textarea name="note" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:border-indigo-400 transition" rows="2">{{ old('note') }}</textarea>
        </div>
        <div>
            <label class="block font-semibold mb-1 text-gray-700">Phương thức thanh toán</label>
            <select name="payment_method" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:border-indigo-400 transition">
                <option value="cod" {{ old('payment_method', 'cod') == 'cod' ? 'selected' : '' }}>Thanh toán khi nhận hàng (COD)</option>
                <option value="bank_transfer" {{ old('payment_method') == 'bank_transfer' ? 'selected' : '' }}>Chuyển khoản ngân hàng</option>
                <option value="vnpay" {{ old('payment_method') == 'vnpay' ? 'selected' : '' }}>VNPay</option>
                <option value="momo" {{ old('payment_method') == 'momo' ? 'selected' : '' }}>Momo</option>
            </select>
        </div>
        <div class="bg-gray-50 rounded-lg p-4">
            <h3 class="font-bold mb-2 text-gray-800">Sản phẩm trong giỏ hàng</h3>
            <ul class="mb-2 space-y-1 text-gray-700">
                @foreach($cartItems as $item)
                    <li>
                        <span class="font-semibold">{{ $item->product->name }}</span>
                        @if($item->color) <span class="text-sm text-gray-500">({{ $item->color->name }})</span> @endif
                        <span class="ml-2">x {{ $item->quantity }}</span>
                        <span class="float-right font-bold text-indigo-700">{{ number_format($item->product->price * $item->quantity) }} đ</span>
                    </li>
                @endforeach
            </ul>
            <div class="font-bold text-right text-lg text-indigo-700 border-t pt-2 mt-2">
                Tổng: {{ number_format($total) }} đ
            </div>
        </div>
        <div class="text-right">
            <button type="submit" class="bg-indigo-700 text-white px-10 py-3 rounded-lg font-bold hover:bg-indigo-800 shadow-lg transition text-lg">
                <i class="fas fa-check mr-2"></i>Đặt hàng
            </button>
        </div>
    </form>
</div>
@endsection