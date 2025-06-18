@extends('layouts.admin')

@section('title', 'Cập nhật Đơn đặt xe')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded shadow">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Cập nhật Đơn đặt xe</h1>
    <form action="{{ route('admin.carorders.update', $order->id) }}" method="POST">
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
            <label class="block text-sm font-semibold mb-1">Mẫu xe</label>
            <select name="car_model_id" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200" required>
                @foreach($carModels as $model)
                    <option value="{{ $model->id }}" {{ $order->car_model_id == $model->id ? 'selected' : '' }}>{{ $model->name }}</option>
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
                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Chờ xử lý</option>
                <option value="confirmed" {{ $order->status == 'confirmed' ? 'selected' : '' }}>Đã xác nhận</option>
                <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Đang xử lý</option>
                <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Hoàn thành</option>
                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Đã huỷ</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-semibold mb-1">Ngày đặt</label>
            <input type="datetime-local" name="created_at" value="{{ old('created_at', $order->created_at ? $order->created_at->format('Y-m-d\TH:i') : '') }}" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200">
        </div>
        <div class="flex justify-end gap-2 mt-6">
            <a href="{{ route('admin.carorders.index') }}" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Quay lại</a>
            <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 font-semibold">Cập nhật</button>
        </div>
    </form>
</div>
@endsection
