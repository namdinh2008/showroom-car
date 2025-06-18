@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Thêm phụ kiện mới</h1>
    <form action="{{ route('admin.accessories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Tên phụ kiện</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Mô tả</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Giá</label>
            <input type="number" name="price" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Kho</label>
            <input type="number" name="stock" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Danh mục</label>
            <input type="text" name="category" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Ảnh (URL)</label>
            <input type="url" name="image_url" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Thêm mới</button>
        <a href="{{ route('admin.accessories.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
