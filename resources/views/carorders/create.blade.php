@extends('layouts.app')
@section('content')
<div class="max-w-2xl mx-auto py-10 px-4">
    <h1 class="text-3xl font-bold mb-4">Đặt mua {{ $carModel->name }}</h1>
    <img src="{{ $carModel->image_url }}" alt="{{ $carModel->name }}" class="rounded-lg shadow mb-4 w-full max-w-md mx-auto">
    <form action="{{ route('cars.order.store', $carModel->id) }}" method="POST" class="bg-white rounded-lg shadow p-6">
        @csrf
        <h2 class="text-lg font-semibold mb-2">Chọn tuỳ chọn cấu hình:</h2>
        <div class="mb-4 space-y-2">
            @foreach($options as $option)
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="options[]" value="{{ $option->id }}">
                    <span class="font-medium">{{ $option->option_type }}:</span>
                    <span>{{ $option->name }}</span>
                    <span class="text-green-600">+${{ number_format($option->price_adjustment) }}</span>
                </label>
            @endforeach
        </div>
        <h2 class="text-lg font-semibold mb-2 mt-6">Thông tin khách hàng:</h2>
        <div class="mb-3">
            <input type="text" name="name" class="form-input w-full" placeholder="Họ tên" required>
        </div>
        <div class="mb-3">
            <input type="email" name="email" class="form-input w-full" placeholder="Email" required>
        </div>
        <div class="mb-3">
            <input type="text" name="phone" class="form-input w-full" placeholder="Số điện thoại" required>
        </div>
        <div class="mb-3">
            <input type="text" name="address" class="form-input w-full" placeholder="Địa chỉ" required>
        </div>
        <button type="submit" class="mt-4 px-6 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">Đặt trước</button>
    </form>
</div>
@endsection
