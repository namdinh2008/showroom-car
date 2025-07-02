@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@extends('admin.layouts.app')

@section('title', 'Thêm phiên bản xe')

@section('content')
    <div class="card shadow mb-4 mx-3">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm phiên bản xe</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.carvariants.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="car_model_id">Mẫu xe</label>
                    <select name="car_model_id" id="car_model_id" class="form-control" required>
                        @foreach ($carModels as $model)
                            <option value="{{ $model->id }}">{{ $model->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="name">Tên phiên bản</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="description">Mô tả</label>
                    <textarea name="description" class="form-control" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="features">Tính năng</label>
                    <textarea name="features" class="form-control" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="price">Giá</label>
                    <input type="number" name="price" class="form-control" required>
                </div>

                <div class="form-group form-check">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" class="form-check-input" id="is_active" checked>
                    <label class="form-check-label" for="is_active">Hiển thị</label>
                </div>

                <button type="submit" class="btn btn-primary">Lưu</button>
            </form>
        </div>
    </div>
@endsection