@extends('layouts.admin')

@section('title', 'Cập nhật Đơn hàng phụ kiện')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded shadow">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Cập nhật Đơn hàng phụ kiện</h1>
    <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block text-sm font-semibold mb-1">Khách hàng</label>
            <select name="user_id" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $order->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }} ({{ $user->email }})</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-semibold mb-1">Tổng giá trị đơn (VNĐ)</label>
            <input type="number" name="total_price" value="{{ old('total_price', $order->total_price) }}" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200" required>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-semibold mb-1">Trạng thái đơn</label>
            <select name="status" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200" required>
                <option value="paid" {{ $order->status == 'paid' ? 'selected' : '' }}>Đã thanh toán</option>
                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Chờ thanh toán</option>
                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Đã huỷ</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-semibold mb-1">Ngày đặt</label>
            <input type="datetime-local" name="created_at" value="{{ old('created_at', $order->created_at ? $order->created_at->format('Y-m-d\TH:i') : '') }}" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200">
        </div>
        <div class="mb-6">
            <label class="block text-sm font-semibold mb-1">Chi tiết đơn hàng</label>
            <table class="w-full border text-sm">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="p-2">Phụ kiện</th>
                        <th class="p-2">Số lượng</th>
                        <th class="p-2">Giá</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->details as $detail)
                        <tr>
                            <td>
                                <select name="details[{{ $loop->index }}][accessory_id]" class="border rounded px-2 py-1">
                                    @foreach($accessories as $acc)
                                        <option value="{{ $acc->id }}" {{ $detail->accessory_id == $acc->id ? 'selected' : '' }}>{{ $acc->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="number" name="details[{{ $loop->index }}][quantity]" value="{{ $detail->quantity }}" class="border rounded px-2 py-1 w-20">
                            </td>
                            <td>
                                <input type="number" name="details[{{ $loop->index }}][price]" value="{{ $detail->price }}" class="border rounded px-2 py-1 w-28">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="flex justify-end gap-2 mt-6">
            <a href="{{ route('admin.orders.index') }}" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Quay lại</a>
            <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 font-semibold">Cập nhật</button>
        </div>
    </form>
</div>
@endsection
