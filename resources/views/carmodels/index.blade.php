@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Danh sách các mẫu xe</h1>
    <form method="GET" action="" class="mb-4 flex flex-wrap gap-3 items-end">
        <div>
            <label for="search" class="block text-sm font-semibold">Tìm kiếm tên xe</label>
            <input type="text" name="search" id="search" value="{{ request('search') }}" class="border rounded px-3 py-2" placeholder="Nhập tên xe...">
        </div>
        <div>
            <label for="price_min" class="block text-sm font-semibold">Giá từ</label>
            <input type="number" name="price_min" id="price_min" value="{{ request('price_min') }}" class="border rounded px-3 py-2" placeholder="Tối thiểu">
        </div>
        <div>
            <label for="price_max" class="block text-sm font-semibold">Giá đến</label>
            <input type="number" name="price_max" id="price_max" value="{{ request('price_max') }}" class="border rounded px-3 py-2" placeholder="Tối đa">
        </div>
        <div>
            <label for="is_active" class="block text-sm font-semibold">Trạng thái</label>
            <select name="is_active" id="is_active" class="border rounded px-3 py-2">
                <option value="">Tất cả</option>
                <option value="1" {{ request('is_active')==='1' ? 'selected' : '' }}>Hiển thị</option>
                <option value="0" {{ request('is_active')==='0' ? 'selected' : '' }}>Ẩn</option>
            </select>
        </div>
        <div>
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded">Tìm kiếm</button>
        </div>
    </form>
    <div class="row">
        @foreach($carModels as $car)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ $car->image_url }}" class="card-img-top" alt="{{ $car->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $car->name }}</h5>
                        <p class="card-text">{{ $car->description }}</p>
                        <a href="{{ route('cars.show', $car->id) }}" class="btn btn-primary">Xem chi tiết</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
