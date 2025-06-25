@extends('layouts.app')

@section('title', 'Home')

@section('content')

{{-- ===== Hero/Banner Section ===== --}}
<section class="relative h-screen flex items-end justify-center text-white overflow-hidden bg-black">
    <img src="https://digitalassets.tesla.com/tesla-contents/image/upload/f_auto,q_auto/Homepage-Promotional-Carousel-Model-3-Desktop-US.png" alt="Tesla Model S" class="absolute inset-0 w-full h-full object-cover opacity-80" />
    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-70"></div>
    <div class="relative z-10 text-center pb-24 px-4 animate-fade-in-up">
        <h1 class="text-6xl md:text-7xl font-extrabold mb-4 tracking-tight drop-shadow-lg">
            Model S
        </h1>
        <p class="text-xl md:text-2xl font-medium mb-8 drop-shadow">
            Tốc độ tối thượng. Tính an toàn vô song.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-6">
            @if(isset($carModels[0]))
            <a href="{{ route('car_models.show', ['id' => $carModels[0]->id]) }}" class="bg-white text-gray-900 font-bold px-10 py-3 rounded-full text-lg hover:bg-gray-100 transition-colors duration-300 transform hover:scale-105 shadow-lg border-2 border-white">
                <i class="fas fa-search mr-2"></i>Khám phá
            </a>
            @endif
            <a href="#" class="bg-gradient-to-r from-indigo-700 to-indigo-500 text-white font-bold px-10 py-3 rounded-full text-lg hover:from-indigo-800 hover:to-indigo-600 transition-colors duration-300 transform hover:scale-105 shadow-lg border-2 border-indigo-500">
                <i class="fas fa-shopping-cart mr-2"></i>Mua ngay
            </a>
        </div>
    </div>
</section>

{{-- ===== Car Categories ===== --}}
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <h2 class="text-4xl font-extrabold text-center text-gray-900 mb-12 tracking-tight">Dòng xe của chúng tôi</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach ($carModels as $model)
            <a href="{{ route('car_models.show', ['id' => $model->id]) }}"
                class="block bg-white rounded-2xl overflow-hidden shadow hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 border border-gray-100 group">
                <div class="relative">
                    <img src="{{ $model->image_url }}" alt="{{ $model->name }}"
                        class="w-full h-52 object-cover group-hover:scale-105 transition-transform duration-500 ease-out" />
                    <span class="absolute top-3 left-3 bg-indigo-600/90 text-white text-xs font-semibold px-3 py-1 rounded-full shadow group-hover:bg-indigo-700 transition z-10">
                        {{ $model->name }}
                    </span>
                    <span class="absolute bottom-4 left-1/2 transform -translate-x-1/2 z-10">
                        <span class="bg-white/80 backdrop-blur px-4 py-2 rounded-full shadow flex items-center">
                            <span class="inline-block text-indigo-700 font-bold text-base">
                                <i class="fas fa-search mr-2"></i>Khám phá
                            </span>
                        </span>
                    </span>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== Featured Cars ===== --}}
<section class="py-20 bg-gradient-to-b from-gray-100 to-white">
    <div class="container mx-auto px-6">
        <h2 class="text-4xl font-extrabold text-center text-gray-900 mb-12 tracking-tight">Sản phẩm nổi bật</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach ($featuredCars as $car)
            <div class="relative bg-white rounded-2xl shadow hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 overflow-hidden group border border-gray-100">
                <img src="{{ $car->image_url }}" class="w-full h-52 object-cover object-center group-hover:scale-105 transition-transform duration-500 ease-out" alt="{{ $car->name }}">
                <!-- Badge tên xe -->
                <span class="absolute top-3 left-3 bg-indigo-600 text-white text-xs font-semibold px-3 py-1 rounded-full shadow group-hover:bg-indigo-700 transition z-10">
                    {{ $car->name }}
                </span>
                <!-- Nút thêm vào giỏ hàng ở góc phải trên ảnh -->
                <form action="{{ route('cart.add') }}" method="POST" class="absolute top-3 right-3 z-20">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $car->id }}">
                    <input type="hidden" name="quantity" value="1">
                    <button type="submit" class="bg-indigo-700 text-white font-medium px-3 py-1.5 rounded-full text-sm hover:bg-indigo-800 transition-colors duration-300 shadow flex items-center">
                        <i class="fas fa-cart-plus"></i>
                    </button>
                </form>
                <div class="p-5 pt-8">
                    <p class="text-gray-600 text-sm mb-3 line-clamp-3">{{ $car->description }}</p>
                    <div class="flex items-center justify-between">
                        <span class="text-red-600 font-bold text-lg">
                            {{ number_format($car->product->price) }} <span class="text-base">đ</span>
                        </span>
                        <span class="bg-green-50 text-green-700 text-xs font-semibold px-3 py-1 rounded-full border border-green-200">
                            Còn hàng
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== Accessories ===== --}}
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <h2 class="text-4xl font-extrabold text-center text-gray-900 mb-12 tracking-tight">Phụ kiện cao cấp</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10">
            @foreach ($accessories as $item)
            <div class="relative border border-gray-200 rounded-2xl p-6 text-center bg-white hover:shadow-xl transform hover:-translate-y-2 transition-all duration-300">
                <img src="{{ $item->product->image_url }}" class="h-36 object-contain mx-auto mb-4" alt="{{ $item->product->name }}">
                <h3 class="font-bold text-lg text-gray-800 mb-1 line-clamp-2">{{ $item->product->name }}</h3>
                <p class="text-red-600 text-xl font-semibold mb-2">{{ number_format($item->product->price) }} đ</p>
                <!-- Nút thêm vào giỏ hàng ở góc phải -->
                <form action="{{ route('cart.add') }}" method="POST" class="absolute top-4 right-4 z-10">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $item->product->id }}">
                    <input type="hidden" name="quantity" value="1">
                    <button type="submit" class="bg-indigo-700 text-white px-3 py-1.5 rounded-full text-sm hover:bg-indigo-800 transition-colors duration-300 shadow flex items-center">
                        <i class="fas fa-cart-plus"></i>
                    </button>
                </form>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== Blog Section ===== --}}
<section class="py-20 bg-gradient-to-b from-gray-100 to-white">
    <div class="container mx-auto px-6">
        <h2 class="text-4xl font-extrabold text-center text-gray-900 mb-12 tracking-tight">Tin tức & Blog</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach ($blogs as $blog)
            <a href="#" class="block bg-white rounded-2xl shadow-lg hover:shadow-2xl transform hover:scale-105 transition-all duration-300 overflow-hidden border border-gray-100">
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

@push('styles')
<style>
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

    .bg-black {
        background-color: #000;
    }

    /* Custom scroll for cards */
    .overflow-x-auto::-webkit-scrollbar {
        height: 8px;
    }

    .overflow-x-auto::-webkit-scrollbar-thumb {
        background: #e5e7eb;
        border-radius: 4px;
    }
</style>
@endpush