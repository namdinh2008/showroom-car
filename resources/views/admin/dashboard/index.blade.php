@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">👋 Chào mừng, Admin</h1>
</div>

<div class="row">
    {{-- Tổng sản phẩm --}}
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tổng sản phẩm</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalProducts }}</div>
            </div>
        </div>
    </div>

    {{-- Tổng đơn hàng --}}
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Tổng đơn hàng</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalOrders }}</div>
            </div>
        </div>
    </div>

    {{-- Tổng người dùng --}}
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Tổng người dùng</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalUsers }}</div>
            </div>
        </div>
    </div>

    {{-- Tổng phụ kiện --}}
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Tổng phụ kiện</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalAccessories }}</div>
            </div>
        </div>
    </div>

    {{-- Tổng hãng xe (cars) --}}
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-secondary shadow h-100 py-2">
            <div class="card-body">
                <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Tổng hãng xe</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalCars }}</div>
            </div>
        </div>
    </div>

    {{-- Tổng mẫu xe --}}
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tổng mẫu xe</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalCarModels }}</div>
            </div>
        </div>
    </div>

    {{-- Tổng phiên bản xe --}}
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-dark shadow h-100 py-2">
            <div class="card-body">
                <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Tổng phiên bản xe</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalCarVariants }}</div>
            </div>
        </div>
    </div>

    {{-- Tổng bài viết blog --}}
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Bài viết Blog</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalBlogs }}</div>
            </div>
        </div>
    </div>
</div>
@endsection