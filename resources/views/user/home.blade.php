@extends('layouts.app')

@section('title', 'Home')

@section('content')
    {{-- ===== Banner Section (Enhanced with gradient, subtle overlay, and slightly refined text) ===== --}}
    <section class="bg-gradient-to-r from-orange-50 to-red-100 py-24 relative overflow-hidden">
        {{-- Subtle background pattern/overlay for visual interest --}}
        <div class="absolute inset-0 bg-pattern-dots opacity-10 pointer-events-none"></div>

        <div class="container mx-auto px-6 flex flex-col lg:flex-row items-center justify-between relative z-10">
            <div class="max-w-xl mb-12 lg:mb-0 text-center lg:text-left animate-fade-in-up">
                <h2 class="text-5xl font-extrabold text-gray-900 mb-6 leading-tight">
                    Đặt xe Mơ Ước <br class="hidden sm:inline" /> Phụ kiện cao cấp
                </h2>
                <p class="text-lg text-gray-700 mb-8 max-w-md mx-auto lg:mx-0">
                    Showroom uy tín hàng đầu, mang đến những dòng xe đẳng cấp và phụ kiện độc đáo. Trải nghiệm mua sắm chuẩn 5 sao cùng dịch vụ tận tâm.
                </p>
                <a href="{{ route('admin.carmodels.index') }}" class="inline-block bg-red-600 text-white text-xl font-semibold px-10 py-4 rounded-full shadow-lg hover:bg-red-700 transform hover:scale-105 transition-all duration-300 ease-in-out">
                    Khám phá ngay
                </a>
            </div>
            <div class="relative w-full lg:w-1/2 flex justify-center lg:justify-end animate-fade-in-right">
                {{-- Add a subtle shadow or glow for depth --}}
                <img src="https://i.pinimg.com/736x/0e/13/c0/0e13c0a0c04befda2b72c1d5754a2368.jpg" alt="Showroom Banner" class="w-full max-w-lg object-contain drop-shadow-2xl" />
            </div>
        </div>
    </section>

    ---

    {{-- ===== Car Categories (Refined cards, hover effects, and a clearer title) ===== --}}
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <h3 class="text-4xl font-extrabold text-center text-gray-900 mb-12 leading-tight">
                Dòng xe nổi bật của chúng tôi
            </h3>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 text-center">
                @foreach ($carModels as $model)
                    <div class="p-6 bg-white rounded-xl shadow-md hover:shadow-xl transform hover:-translate-y-2 transition-all duration-300 ease-in-out cursor-pointer group">
                        <img src="{{ $model->image_url }}" alt="{{ $model->name }}" class="mx-auto h-28 object-contain mb-4 group-hover:scale-105 transition-transform duration-300">
                        <p class="font-bold text-xl text-gray-800 group-hover:text-red-600 transition-colors">{{ $model->name }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    ---

    {{-- ===== Featured Cars (More engaging cards, clear pricing, and a call to action) ===== --}}
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <h3 class="text-4xl font-extrabold text-center text-gray-900 mb-12 leading-tight">
                Sản phẩm được quan tâm nhất
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
                @foreach ($featuredCars as $car)
                    <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transform hover:scale-102 transition-all duration-300 overflow-hidden group">
                        <img src="{{ $car->image_url }}" class="w-full h-56 object-cover rounded-t-lg transition-transform duration-300 group-hover:scale-105" alt="{{ $car->name }}">
                        <div class="p-6">
                            <h4 class="font-extrabold text-2xl text-gray-900 mb-2 group-hover:text-indigo-700 transition-colors">{{ $car->name }}</h4>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ $car->description }}</p>
                            <div class="flex items-baseline justify-between mb-4">
                                <span class="text-red-600 font-bold text-2xl">
                                    {{ number_format($car->base_price) }} <span class="text-xl">đ</span>
                                </span>
                                {{-- Optional: Add a subtle badge for status --}}
                                <span class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded-full">Còn hàng</span>
                            </div>
                            <a href="#" class="block text-center bg-indigo-700 text-white font-semibold px-6 py-3 rounded-full hover:bg-indigo-800 transform hover:scale-95 transition-all duration-300">
                                Xem chi tiết
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    ---

    {{-- ===== Accessories (Clean grid, clear pricing, subtle border) ===== --}}
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <h3 class="text-4xl font-extrabold text-center text-gray-900 mb-12 leading-tight">
                Phụ kiện cao cấp
            </h3>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach ($accessories as $item)
                    <div class="border border-gray-200 rounded-xl p-6 text-center bg-white hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300">
                        <img src="{{ $item->image_url }}" class="h-32 object-contain mx-auto mb-4" alt="{{ $item->name }}">
                        <p class="font-bold text-lg text-gray-800 mb-1">{{ $item->name }}</p>
                        <p class="text-red-600 text-xl font-semibold">{{ number_format($item->price) }} đ</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    ---

    {{-- ===== Blog Section (Visual cards, limited text, clear call to action) ===== --}}
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <h3 class="text-4xl font-extrabold text-center text-gray-900 mb-12 leading-tight">
                Tin tức & Blog
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @foreach ($blogs as $blog)
                    <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transform hover:scale-102 transition-all duration-300 overflow-hidden">
                        <img src="{{ $blog->image_url }}" class="w-full h-52 object-cover" alt="{{ $blog->title }}">
                        <div class="p-6">
                            <h4 class="font-bold text-xl text-gray-800 mb-3 line-clamp-2">{{ $blog->title }}</h4>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ Str::limit($blog->content, 120) }}</p>
                            <a href="#" class="text-indigo-700 font-semibold hover:text-indigo-900 transition-colors">Đọc thêm &rarr;</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

{{-- Add some basic custom CSS for patterns or animations if Tailwind doesn't directly support --}}
{{-- In a real project, this would go into a dedicated CSS file or Tailwind config --}}
<style>
    @keyframes fadeInBottom {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInRight {
        from {
            opacity: 0;
            transform: translateX(20px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .animate-fade-in-up {
        animation: fadeInBottom 1s ease-out forwards;
    }

    .animate-fade-in-right {
        animation: fadeInRight 1s ease-out forwards;
    }

    /* Simple dots pattern - you could use SVG or a more complex solution */
    .bg-pattern-dots {
        background-image: radial-gradient(#d1d5db 1px, transparent 1px); /* gray-300 */
        background-size: 20px 20px;
    }
</style>