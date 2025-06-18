@extends('layouts.app')
@section('content')
<div class="max-w-4xl mx-auto py-10 px-4">
    <div class="flex flex-col md:flex-row gap-8 items-center bg-white rounded-lg shadow-lg p-6">
        <div class="flex-1 flex justify-center">
            <img src="{{ $carModel->image_url }}" alt="{{ $carModel->name }}" class="rounded-lg shadow w-full max-w-md">
        </div>
        <div class="flex-1">
            <h1 class="text-4xl font-bold mb-2">{{ $carModel->name }}</h1>
            <p class="text-gray-600 mb-4">{{ $carModel->description }}</p>
            <p class="text-2xl font-semibold mb-4 text-red-600">Giá cơ bản: ${{ number_format($carModel->base_price) }}</p>
            <div class="mb-4">
                <h2 class="text-lg font-semibold mb-2">Tuỳ chọn cấu hình:</h2>
                <ul class="space-y-2">
                    @foreach($carModel->configurationOptions as $option)
                        <li class="flex items-center gap-2">
                            @if($option->image_url)
                                <img src="{{ $option->image_url }}" alt="{{ $option->name }}" class="w-10 h-10 rounded object-cover border">
                            @endif
                            <span class="font-medium">{{ $option->option_type }}:</span>
                            <span>{{ $option->name }}</span>
                            <span class="text-green-600">+${{ number_format($option->price_adjustment) }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
            <a href="{{ url('/cars') }}" class="inline-block mt-4 px-6 py-2 bg-gray-800 text-white rounded hover:bg-gray-700 transition">Quay lại danh sách</a>
        </div>
    </div>
</div>
@endsection
