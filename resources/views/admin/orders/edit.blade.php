@extends('admin.layouts.app')

@section('title', 'Cập nhật đơn hàng')

@section('content')
<div class="bg-white p-6 rounded shadow max-w-2xl mx-auto">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">✏️ CẬP NHẬT ĐƠN HÀNG</h1>

    <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Trạng thái đơn hàng --}}
        <div class="mb-4">
            <label for="status" class="block text-sm font-semibold text-gray-700 mb-1">Trạng thái</label>
            <select name="status" id="status" class="w-full border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:ring-indigo-200 shadow-sm">
                <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Chờ xử lý</option>
                <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>Đang xử lý</option>
                <option value="shipped" {{ $order->status === 'shipped' ? 'selected' : '' }}>Đã giao</option>
                <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Đã huỷ</option>
            </select>
        </div>

        {{-- Ghi chú --}}
        <div class="mb-4">
            <label for="note" class="block text-sm font-semibold text-gray-700 mb-1">Ghi chú</label>
            <textarea id="note" name="note" rows="4"
                      class="w-full border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:ring-indigo-200 shadow-sm">{{ old('note', $order->note) }}</textarea>
        </div>

        {{-- Nút lưu --}}
        <div class="text-right">
            <button type="submit"
                    class="inline-flex items-center gap-2 px-6 py-2 bg-indigo-600 font-semibold text-white rounded-md shadow hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
                Cập nhật đơn hàng
            </button>
        </div>
    </form>
</div>
@endsection