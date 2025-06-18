@extends('layouts.app')
@section('content')
<div class="max-w-xl mx-auto py-10 px-4">
    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-bold mb-4">Xác nhận đặt mua {{ $carModel->name }}</h1>
        <ul class="mb-4">
            <li><strong>Họ tên:</strong> {{ $data['name'] }}</li>
            <li><strong>Email:</strong> {{ $data['email'] }}</li>
            <li><strong>Số điện thoại:</strong> {{ $data['phone'] }}</li>
            <li><strong>Địa chỉ:</strong> {{ $data['address'] }}</li>
        </ul>
        <h2 class="text-lg font-semibold mb-2">Tuỳ chọn đã chọn:</h2>
        <ul class="mb-4">
            @forelse($selectedOptions as $option)
                <li>{{ $option->option_type }}: {{ $option->name }} <span class="text-green-600">+${{ number_format($option->price_adjustment) }}</span></li>
            @empty
                <li>Không có tuỳ chọn thêm</li>
            @endforelse
        </ul>
        <div class="text-xl font-bold text-red-600 mb-4">Tổng giá tạm tính: ${{ number_format($total) }}</div>
        <div class="alert alert-success">Đơn đặt trước của bạn đã được ghi nhận! (Demo)</div>
        <a href="/" class="btn btn-primary mt-4">Về trang chủ</a>
    </div>
</div>
@endsection
