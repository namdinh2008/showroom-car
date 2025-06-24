@extends('admin.layouts.app')

@section('content')
<div class="px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">👋 Chào mừng, <span class="text-blue-600">Admin</span></h1>
    <p class="mb-6 text-gray-600">Đây là bảng điều khiển của hệ thống showroom.</p>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        {{-- Sản phẩm --}}
        <div class="bg-white p-4 shadow rounded">
            <h2 class="text-gray-500 text-sm">Sản phẩm</h2>
            <p class="text-2xl font-bold text-indigo-600">{{ $totalProducts }}</p>
        </div>

        {{-- Đơn hàng --}}
        <div class="bg-white p-4 shadow rounded">
            <h2 class="text-gray-500 text-sm">Đơn hàng</h2>
            <p class="text-2xl font-bold text-green-600">{{ $totalOrders }}</p>
        </div>

        {{-- Người dùng --}}
        <div class="bg-white p-4 shadow rounded">
            <h2 class="text-gray-500 text-sm">Người dùng</h2>
            <p class="text-2xl font-bold text-orange-600">{{ $totalUsers }}</p>
        </div>

        {{-- Phụ kiện --}}
        <div class="bg-white p-4 shadow rounded">
            <h2 class="text-gray-500 text-sm">Phụ kiện</h2>
            <p class="text-2xl font-bold text-pink-600">{{ $totalAccessories }}</p>
        </div>

        {{-- Mẫu xe --}}
        <div class="bg-white p-4 shadow rounded">
            <h2 class="text-gray-500 text-sm">Mẫu xe</h2>
            <p class="text-2xl font-bold text-blue-500">{{ $totalCarModels }}</p>
        </div>

        {{-- Phiên bản xe --}}
        <div class="bg-white p-4 shadow rounded">
            <h2 class="text-gray-500 text-sm">Phiên bản xe</h2>
            <p class="text-2xl font-bold text-purple-600">{{ $totalCarVariants }}</p>
        </div>

        {{-- Blog --}}
        <div class="bg-white p-4 shadow rounded">
            <h2 class="text-gray-500 text-sm">Bài viết blog</h2>
            <p class="text-2xl font-bold text-yellow-500">{{ $totalBlogs }}</p>
        </div>
    </div>
</div>
@endsection