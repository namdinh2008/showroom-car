@extends('admin.layouts.app')

@section('title', 'Thêm mẫu xe')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Thêm mẫu xe</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.carmodels.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="car_id">Hãng xe</label>
                <select name="car_id" id="car_id" class="form-control" required>
                    @foreach($cars as $car)
                        <option value="{{ $car->id }}">{{ $car->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="name">Tên mẫu xe</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea name="description" id="description" rows="4" class="form-control"></textarea>
            </div>

            <div class="form-group form-check">
                <input type="checkbox" name="is_active" id="is_active" class="form-check-input" checked>
                <label class="form-check-label" for="is_active">Hiển thị</label>
            </div>

            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
</div>
@endsection