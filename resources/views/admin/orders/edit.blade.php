@extends('admin.layouts.app')

@section('title', 'Cập nhật đơn hàng')

@section('content')
    <div class="bg-white p-6 rounded shadow max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">✏️ CẬP NHẬT ĐƠN HÀNG</h1>
        <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Họ tên --}}
            <div class="mb-4">
                <label class="block font-semibold text-sm mb-1">Họ tên</label>
                <input type="text" name="name" value="{{ $order->name }}" disabled
                    class="w-full bg-gray-100 border-gray-300 rounded px-4 py-2 shadow-sm">
            </div>

            {{-- Email --}}
            <div class="mb-4">
                <label class="block font-semibold text-sm mb-1">Email</label>
                <input type="email" name="email" value="{{ $order->email }}" disabled
                    class="w-full bg-gray-100 border-gray-300 rounded px-4 py-2 shadow-sm">
            </div>

            {{-- Số điện thoại --}}
            <div class="mb-4">
                <label class="block font-semibold text-sm mb-1">Số điện thoại</label>
                <input type="text" name="phone" value="{{ $order->phone }}" disabled
                    class="w-full bg-gray-100 border-gray-300 rounded px-4 py-2 shadow-sm">
            </div>

            {{-- Địa chỉ --}}
            <div class="mb-4">
                <label class="block font-semibold text-sm mb-1">Địa chỉ</label>
                <input type="text" name="address" value="{{ $order->address }}" disabled
                    class="w-full bg-gray-100 border-gray-300 rounded px-4 py-2 shadow-sm">
            </div>

            {{-- Phương thức thanh toán --}}
            <div class="mb-4">
                <label class="block font-semibold text-sm mb-1">Phương thức thanh toán</label>
                <input type="text" name="payment_method" value="{{ strtoupper($order->payment_method) }}" disabled
                    class="w-full bg-gray-100 border-gray-300 rounded px-4 py-2 shadow-sm">
            </div>

            {{-- Trạng thái --}}
            <div class="mb-4">
                <label class="block font-semibold text-sm mb-1">Trạng thái đơn hàng</label>
                <select name="status"
                    class="w-full border-gray-300 rounded px-4 py-2 shadow-sm focus:ring focus:ring-indigo-200">
                    @foreach ($statuses as $status)
                        <option value="{{ $status }}" {{ $order->status === $status ? 'selected' : '' }}>
                            {{ ucfirst($status) }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Ghi chú --}}
            <div class="mb-4">
                <label class="block font-semibold text-sm mb-1">Ghi chú</label>
                <textarea name="note" rows="4"
                    class="w-full border-gray-300 rounded px-4 py-2 shadow-sm focus:ring focus:ring-indigo-200">{{ old('note', $order->note) }}</textarea>
            </div>

            {{-- Nút cập nhật --}}
            <div class="text-right">
                <button type="submit"
                    class="px-6 py-2 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-700 shadow">
                    Cập nhật đơn hàng
                </button>
            </div>
        </form>
    </div>
@endsection