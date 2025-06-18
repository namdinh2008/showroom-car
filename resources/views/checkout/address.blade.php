@extends('layouts.app')
@section('content')
<div class="max-w-xl mx-auto bg-white p-8 rounded shadow mt-8">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Nhập địa chỉ giao hàng</h1>
    <form action="{{ route('checkout.address.save') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-sm font-semibold mb-1">Họ và tên</label>
            <input type="text" name="name" value="{{ old('name', Auth::user()->name ?? '') }}" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-semibold mb-1">Số điện thoại</label>
            <input type="text" name="phone" value="{{ old('phone', Auth::user()->phone ?? '') }}" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-semibold mb-1">Địa chỉ giao hàng</label>
            <input type="text" name="address" value="{{ old('address', Auth::user()->address ?? '') }}" class="w-full border rounded px-3 py-2" required>
        </div>
        <div class="flex justify-end gap-2 mt-6">
            <a href="/cart" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Quay lại giỏ hàng</a>
            <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 font-semibold">Lưu địa chỉ</button>
        </div>
    </form>
</div>
@endsection
