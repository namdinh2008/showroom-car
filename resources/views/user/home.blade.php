@extends('layouts.app')

@section('title', 'Home')

@section('content')
    {{-- ===== Banner Section ===== --}}
    <section class="bg-orange-50 py-20 relative overflow-hidden">
        <div class="container mx-auto px-4 flex flex-col lg:flex-row items-center justify-between">
            <div class="max-w-xl mb-10 lg:mb-0">
                <h2 class="text-4xl font-bold text-gray-800 mb-4 leading-snug">
                    Đặt xe Mơ Ước <br /> Phụ kiện cao cấp
                </h2>
                <p class="text-gray-600 mb-6">Showroom uy tín - Giao xe nhanh chóng - Dịch vụ chuẩn 5 sao</p>
                <a href="{{ route('admin.carmodels.index') }}" class="bg-red-500 text-white px-6 py-3 rounded-lg shadow hover:bg-red-600">
                    Xem dòng xe
                </a>
            </div>
            <div class="relative">
                <img src="/assets/showroom_banner.png" alt="Showroom Banner" class="w-full max-w-md" />
            </div>
        </div>
    </section>

    {{-- ===== Car Categories ===== --}}
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <h3 class="text-2xl font-bold text-center text-gray-800 mb-8">Dòng xe nổi bật</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                @foreach ($carModels as $model)
                    <div class="p-4 shadow hover:shadow-lg transition rounded-lg cursor-pointer">
                        <img src="{{ $model->image_url }}" alt="{{ $model->name }}" class="mx-auto h-24 object-contain mb-2">
                        <p class="font-semibold text-gray-700">{{ $model->name }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===== Featured Cars ===== --}}
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <h3 class="text-2xl font-bold text-center text-gray-800 mb-8">Sản phẩm được quan tâm</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($featuredCars as $car)
                    <div class="bg-white rounded-lg shadow p-4">
                        <img src="{{ $car->image_url }}" class="w-full h-40 object-cover rounded mb-4" alt="{{ $car->name }}">
                        <h4 class="font-bold text-gray-800 mb-2">{{ $car->name }}</h4>
                        <p class="text-gray-500 mb-3">{{ $car->description }}</p>
                        <div class="text-red-500 font-semibold mb-3">Giá: {{ number_format($car->base_price) }} đ</div>
                        <a href="#" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Chi tiết</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===== Accessories ===== --}}
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <h3 class="text-2xl font-bold text-center text-gray-800 mb-8">Phụ kiện nổi bật</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @foreach ($accessories as $item)
                    <div class="border rounded-lg p-4 text-center hover:shadow">
                        <img src="{{ $item->image_url }}" class="h-24 object-contain mx-auto mb-2" alt="{{ $item->name }}">
                        <p class="font-medium text-gray-700">{{ $item->name }}</p>
                        <p class="text-red-500 text-sm">{{ number_format($item->price) }} đ</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===== Blog Section ===== --}}
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <h3 class="text-2xl font-bold text-center text-gray-800 mb-8">Bài viết mới nhất</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($blogs as $blog)
                    <div class="bg-white rounded-lg shadow overflow-hidden">
                        <img src="{{ $blog->image_url }}" class="w-full h-40 object-cover" alt="{{ $blog->title }}">
                        <div class="p-4">
                            <h4 class="font-bold text-lg text-gray-800 mb-2">{{ $blog->title }}</h4>
                            <p class="text-gray-600 text-sm mb-4">{{ Str::limit($blog->content, 100) }}</p>
                            <a href="#" class="text-indigo-600 font-semibold">Xem thêm &rarr;</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection