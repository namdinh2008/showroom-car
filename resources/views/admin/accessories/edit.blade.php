@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Sửa phụ kiện</h1>
    <form action="{{ route('admin.accessories.update', $accessory->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Tên phụ kiện</label>
            <input type="text" name="name" class="form-control" value="{{ $accessory->name }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Mô tả</label>
            <textarea name="description" class="form-control">{{ $accessory->description }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Giá</label>
            <input type="number" name="price" class="form-control" value="{{ $accessory->price }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Kho</label>
            <input type="number" name="stock" class="form-control" value="{{ $accessory->stock }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Danh mục</label>
            <input type="text" name="category" class="form-control" value="{{ $accessory->category }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Ảnh (URL)</label>
            <input type="url" name="image_url" class="form-control" value="{{ $accessory->image_url }}">
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('admin.accessories.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
