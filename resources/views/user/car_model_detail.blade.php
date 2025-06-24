@extends('layouts.app')

@section('title', $carModel->name)

@section('content')
    {{-- Header và Footer sẽ dùng layout --}}
    <main class="pt-20">
        <!-- Hero Section -->
        <section class="relative w-full h-screen max-h-[900px] overflow-hidden">
            <img src="{{ $carModel->image_url }}" alt="{{ $carModel->name }}" class="absolute inset-0 w-full h-full object-cover" />
            <div aria-hidden="true" class="absolute inset-0 bg-gradient-to-b from-transparent to-white/90"></div>
            <div class="relative max-w-7xl mx-auto px-6 sm:px-12 flex flex-col justify-center h-full text-center md:text-left md:flex-row md:items-center md:space-x-12">
                <div class="md:w-1/2 max-w-xl mx-auto md:mx-0">
                    <h1 class="text-5xl sm:text-6xl font-extrabold leading-tight tracking-tight text-gray-900">
                        {{ $carModel->name }}
                    </h1>
                    <p class="mt-4 text-lg sm:text-xl font-medium text-gray-700">
                        {{ $variants->first()->name ?? '' }}
                    </p>
                    <div class="mt-6 flex flex-col sm:flex-row sm:space-x-6 space-y-4 sm:space-y-0 justify-center md:justify-start">
                        <a class="inline-block rounded-md bg-black px-8 py-3 text-white font-semibold text-lg hover:bg-gray-900 transition" href="#order">
                            Đặt hàng
                        </a>
                        <a class="inline-block rounded-md border border-black px-8 py-3 text-black font-semibold text-lg hover:bg-black hover:text-white transition" href="#learn">
                            Tìm hiểu thêm
                        </a>
                    </div>
                    <div class="mt-10 grid grid-cols-3 gap-6 text-center text-gray-700 font-semibold text-sm sm:text-base">
                        <div>
                            <p class="text-3xl sm:text-4xl font-extrabold">
                                {{ $variants->first()->features['Quãng đường'] ?? '---' }}
                            </p>
                            <p>Quãng đường</p>
                        </div>
                        <div>
                            <p class="text-3xl sm:text-4xl font-extrabold">
                                {{ $variants->first()->features['Tăng tốc 0-100km/h'] ?? '---' }}
                            </p>
                            <p>Tăng tốc 0-100km/h</p>
                        </div>
                        <div>
                            <p class="text-3xl sm:text-4xl font-extrabold">
                                {{ $variants->first()->features['Công suất'] ?? '---' }}
                            </p>
                            <p>Công suất</p>
                        </div>
                    </div>
                </div>
                <div class="hidden md:block md:w-1/2">
                    <img src="{{ $carModel->image_url }}" alt="{{ $carModel->name }}" class="w-full h-auto rounded-lg shadow-lg" />
                </div>
            </div>
        </section>
        <!-- Features Section -->
        <section class="max-w-7xl mx-auto px-6 sm:px-12 py-20 space-y-20" id="learn">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-center md:text-left">
                @foreach($variants as $variant)
                    <div>
                        <h3 class="text-2xl font-semibold mb-2">{{ $variant->name }}</h3>
                        <ul class="list-disc list-inside text-gray-700 text-base">
                            @foreach(json_decode($variant->features, true) as $key => $value)
                                <li>{{ $key }}: {{ $value }}</li>
                            @endforeach
                        </ul>
                        <p class="mt-2 font-bold text-red-600">Giá: {{ number_format($variant->product->price ?? 0) }} đ</p>
                    </div>
                @endforeach
            </div>
            <!-- Màu sắc -->
            <div class="mt-12">
                <h2 class="text-2xl font-bold mb-4">Màu sắc</h2>
                <div class="flex flex-wrap gap-4">
                    @foreach($variants->first()->colors as $color)
                        <div class="flex flex-col items-center">
                            <img src="{{ $color->image_url }}" alt="{{ $color->color_name }}" class="w-16 h-16 rounded-full border-2 border-gray-300" />
                            <span class="mt-2 text-sm">{{ $color->color_name }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Gallery Section -->
        <section class="bg-gray-50 py-20">
            <div class="max-w-7xl mx-auto px-6 sm:px-12">
                <h2 class="text-4xl font-extrabold mb-12 text-center">Gallery</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                    @foreach($gallery as $img)
                        <img src="{{ $img }}" class="rounded-lg shadow-lg w-full h-auto" />
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Đặt hàng Section (form mẫu) -->
        <section class="max-w-4xl mx-auto px-6 sm:px-12 py-20 space-y-12" id="order">
            <h2 class="text-4xl font-extrabold text-center mb-8">Đặt hàng {{ $carModel->name }}</h2>
            <form action="#" class="space-y-8" method="POST" novalidate>
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2" for="fullName">Họ tên</label>
                        <input class="w-full rounded-md border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-black focus:border-black" id="fullName" name="fullName" placeholder="Nguyễn Văn A" required type="text" />
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2" for="email">Email</label>
                        <input class="w-full rounded-md border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-black focus:border-black" id="email" name="email" placeholder="email@example.com" required type="email" />
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2" for="variant">Chọn phiên bản</label>
                    <select class="w-full rounded-md border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-black focus:border-black" id="variant" name="variant" required>
                        @foreach($variants as $variant)
                            <option value="{{ $variant->id }}">{{ $variant->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2" for="color">Chọn màu</label>
                    <select class="w-full rounded-md border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-black focus:border-black" id="color" name="color" required>
                        @foreach($variants->first()->colors as $color)
                            <option value="{{ $color->id }}">{{ $color->color_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2" for="additionalNotes">Ghi chú thêm</label>
                    <textarea class="w-full rounded-md border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-black focus:border-black resize-none" id="additionalNotes" name="additionalNotes" placeholder="Yêu cầu đặc biệt hoặc câu hỏi?" rows="4"></textarea>
                </div>
                <div class="text-center">
                    <button class="inline-block rounded-md bg-black px-12 py-4 text-white font-semibold text-lg hover:bg-gray-900 transition" type="submit">
                        Gửi yêu cầu
                    </button>
                </div>
            </form>
        </section>
        <!-- Footer sẽ dùng layout -->
    </main>
@endsection
