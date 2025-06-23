@extends('admin.layouts.app')

@section('content')
<div class="px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">👋 Chào mừng, <span class="text-blue-600">Admin</span></h1>
    <p class="mb-6 text-gray-600">Đây là bảng điều khiển của hệ thống showroom.</p>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        <div class="bg-white p-4 shadow rounded">
            <h2 class="text-gray-500 text-sm">Sản phẩm</h2>
            <p class="text-2xl font-bold text-indigo-600">124</p>
        </div>
        <div class="bg-white p-4 shadow rounded">
            <h2 class="text-gray-500 text-sm">Đơn hàng</h2>
            <p class="text-2xl font-bold text-green-600">52</p>
        </div>
        <div class="bg-white p-4 shadow rounded">
            <h2 class="text-gray-500 text-sm">Người dùng</h2>
            <p class="text-2xl font-bold text-orange-600">87</p>
        </div>
        <div class="bg-white p-4 shadow rounded">
            <h2 class="text-gray-500 text-sm">Phụ kiện</h2>
            <p class="text-2xl font-bold text-pink-600">39</p>
        </div>
    </div>
</div>
@endsection