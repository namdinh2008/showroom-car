@extends('layouts.app')

@section('title', 'Home')

@section('content')

    {{-- ===== Hero/Banner Section (Tesla-inspired: Full-screen height, large imagery, minimalist text) ===== --}}
    <section class="relative h-screen flex items-end justify-center text-white overflow-hidden bg-black">
        {{-- Background Image/Video (Replace with actual car image/video) --}}
        <img src="https://digitalassets.tesla.com/tesla-contents/image/upload/f_auto,q_auto/Homepage-Promotional-Carousel-Model-3-Desktop-US.png" alt="Tesla Model S" class="absolute inset-0 w-full h-full object-cover opacity-80" />

        {{-- Gradient Overlay (Optional, for better text readability) --}}
        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-70"></div>

        <div class="relative z-10 text-center pb-20 px-4 animate-fade-in-up">
            <h1 class="text-6xl md:text-7xl font-extrabold mb-4 tracking-tight">
                Model S
            </h1>
            <p class="text-xl md:text-2xl font-medium mb-8">
                Tốc độ tối thượng. Tính an toàn vô song.
            </p>
            {{-- Nút Khám phá ở banner có thể trỏ về model đầu tiên (nếu muốn) --}}
            <div class="flex flex-col sm:flex-row justify-center gap-6">
                @if(isset($carModels[0]))
                    <a href="{{ route('car_models.show', ['id' => $carModels[0]->id]) }}" class="bg-white text-gray-900 font-bold px-10 py-3 rounded-md text-lg hover:bg-gray-100 transition-colors duration-300 transform hover:scale-105 shadow-lg">
                        Khám phá
                    </a>
                @endif
                <a href="#" class="bg-gray-800 text-white font-bold px-10 py-3 rounded-md text-lg hover:bg-gray-700 transition-colors duration-300 transform hover:scale-105 shadow-lg">
                    Mua ngay
                </a>
            </div>
        </div>
    </section>

    ---
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-extrabold text-center text-gray-900 mb-12">
                Dòng xe của chúng tôi
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach ($carModels as $model)
                    <a href="{{ route('car_models.show', ['id' => $model->id]) }}" class="block bg-gray-50 rounded-lg overflow-hidden shadow-sm hover:shadow-md transform hover:-translate-y-1 transition-all duration-300 group">
                        <img src="{{ $model->image_url }}" alt="{{ $model->name }}" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500 ease-out">
                        <div class="p-6 text-center">
                            <h3 class="text-xl font-semibold text-gray-800 mb-2 group-hover:text-red-600 transition-colors">{{ $model->name }}</h3>
                            <p class="text-gray-600 text-sm">Khám phá các phiên bản</p>
                            <a href="{{ route('car_models.show', ['id' => $model->id]) }}" class="mt-4 inline-block bg-white text-gray-900 font-bold px-6 py-2 rounded-md text-base hover:bg-gray-100 transition-colors duration-300 transform hover:scale-105 shadow">Khám phá</a>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    ---

    {{-- ===== Featured Cars (Minimalist presentation, strong visual, clear pricing) ===== --}}
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-extrabold text-center text-gray-900 mb-12">
                Sản phẩm nổi bật
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @foreach ($featuredCars as $car)
                    <a href="#" class="block bg-white rounded-lg shadow-lg hover:shadow-xl transform hover:scale-102 transition-all duration-300 overflow-hidden group">
                        <img src="{{ $car->image_url }}" class="w-full h-64 object-cover object-center group-hover:scale-105 transition-transform duration-500 ease-out" alt="{{ $car->name }}">
                        <div class="p-6">
                            <h3 class="font-bold text-2xl text-gray-900 mb-2 group-hover:text-indigo-700 transition-colors">{{ $car->name }}</h3>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ $car->description }}</p>
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-red-600 font-bold text-2xl">
                                    {{ number_format($car->base_price) }} <span class="text-xl">đ</span>
                                </span>
                                <span class="bg-green-50 text-green-700 text-xs font-semibold px-3 py-1 rounded-full border border-green-200">
                                    Còn hàng
                                </span>
                            </div>
                            <button class="w-full bg-indigo-700 text-white font-semibold px-6 py-3 rounded-md hover:bg-indigo-800 transform hover:scale-98 transition-all duration-300">
                                Xem chi tiết
                            </button>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    ---

    {{-- ===== Accessories (Clean grid, clear pricing, subtle border, image focus) ===== --}}
    <section class="py-16 bg-white relative"> {{-- Added 'relative' for absolute positioning of nav buttons --}}
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-extrabold text-center text-gray-900 mb-12">
                Phụ kiện cao cấp
            </h2>

            {{-- Carousel Container --}}
            <div id="accessories-carousel" class="relative overflow-hidden">
                {{-- Carousel Items Wrapper --}}
                <div class="flex overflow-x-hidden scroll-smooth snap-x snap-mandatory hide-scroll-bar gap-4" id="carousel-items">
                    @foreach ($accessories as $item)
                        <div class="flex-shrink-0 w-[64vw] h-[80vh] snap-center px-0 overflow-hidden">
                            <a href="#" class="block border border-gray-200 rounded-xl p-6 text-center shadow-md hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300 h-full flex flex-col justify-between bg-center overflow-hidden" style="background-image: url('{{ $item->img_url }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
                                <div class="flex-grow"></div>
                                <h1 class="font-bold text-white text-4xl text-start">{{ $item->name }}</h1>
                                <p class="text-white text-base inline-block mb-6 text-start">{{ $item->description }}</p>
                                <p class="text-white text-2xl font-semibold bg-blue-700 rounded-md px-3 py-2 inline-block w-[200px]">Buy Now</p>
                            </a>
                        </div>
                    @endforeach
                </div>

                {{-- Navigation Buttons (Previous/Next) --}}
                <button id="prev-slide" class="absolute top-1/2 left-4 -translate-y-1/2 bg-gray-800 text-white p-3 rounded-full shadow-lg opacity-70 hover:opacity-100 transition-opacity duration-300 hidden md:block">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </button>
                <button id="next-slide" class="absolute top-1/2 right-4 -translate-y-1/2 bg-gray-800 text-white p-3 rounded-full shadow-lg opacity-70 hover:opacity-100 transition-opacity duration-300 hidden md:block">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </button>

            </div>
            <div id="carousel-dots" class="absolute left-0 right-0 flex justify-center space-x-2 mt-4">
                    {{-- Dots will be dynamically added by JavaScript --}}
                </div>
        </div>
    </section>


    ---

    {{-- ===== Blog Section (Visual cards, limited text, clear call to action) ===== --}}
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-extrabold text-center text-gray-900 mb-12">
                Tin tức & Blog
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @foreach ($blogs as $blog)
                    <a href="#" class="block bg-white rounded-lg shadow-lg hover:shadow-xl transform hover:scale-102 transition-all duration-300 overflow-hidden">
                        <img src="{{ $blog->image_url }}" class="w-full h-56 object-cover" alt="{{ $blog->title }}">
                        <div class="p-6">
                            <h3 class="font-bold text-xl text-gray-800 mb-3 line-clamp-2 group-hover:text-indigo-700 transition-colors">{{ $blog->title }}</h3>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ Str::limit($blog->content, 120) }}</p>
                            <span class="text-indigo-700 font-semibold hover:text-indigo-900 transition-colors">Đọc thêm &rarr;</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection

{{-- Add custom CSS for subtle animations --}}
@push('styles')
<style>
    @keyframes fadeInBottom {
        from {
            opacity: 0;
            transform: translateY(30px); /* Increased initial translateY */
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .animate-fade-in-up {
        animation: fadeInBottom 1s ease-out forwards;
        animation-delay: 0.5s;
        opacity: 0;
    }
    .bg-black {
        background-color: #000;
    }

    .hide-scroll-bar::-webkit-scrollbar {
        display: none;
    }
    /* For IE, Edge and Firefox */
    .hide-scroll-bar {
        -ms-overflow-style: none;  /* IE and Edge */
        scrollbar-width: none;  /* Firefox */
    }

    /* Simple fade-in animations for other sections if you want consistent effects */
    @keyframes fadeInBottom {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .animate-fade-in-up {
        animation: fadeInBottom 1s ease-out forwards;
        animation-delay: 0.5s;
        opacity: 0;
    }
</style>
@endpush