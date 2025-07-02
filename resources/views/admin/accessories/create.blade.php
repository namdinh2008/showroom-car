@extends('admin.layouts.app')

@section('title', 'Thêm phụ kiện')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Thêm phụ kiện mới</h6>
            <a href="{{ route('admin.accessories.index') }}" class="btn btn-sm btn-secondary">
                <i class="fas fa-arrow-left"></i> Quay lại
            </a>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.accessories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Tên --}}
                <div class="form-group">
                    <label for="name">Tên phụ kiện <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                {{-- Mô tả --}}
                <div class="form-group">
                    <label for="description">Mô tả</label>
                    <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                    @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                {{-- Giá --}}
                <div class="form-group">
                    <label for="price">Giá (VNĐ) <span class="text-danger">*</span></label>
                    <input type="number" name="price" class="form-control" value="{{ old('price') }}" required>
                    @error('price') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                {{-- Ảnh --}}
                <div class="form-group">
                    <label for="image">Hình ảnh</label>
                    <input type="file" name="image" class="form-control-file" accept="image/*">
                    @error('image') <small class="text-danger d-block">{{ $message }}</small> @enderror
                </div>

                {{-- Trạng thái --}}
                <div class="form-group form-check">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" class="form-check-input" id="is_active" value="1" checked>
                    <label class="form-check-label" for="is_active">Hiển thị phụ kiện</label>
                </div>

                <button type="submit" class="btn btn-success">
                    Lưu phụ kiện
                </button>
            </form>
        </div>
    </div>
@endsection