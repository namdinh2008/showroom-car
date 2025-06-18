@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Quản lý phụ kiện</h1>
    <a href="{{ route('admin.accessories.create') }}" class="btn btn-success mb-3">Thêm phụ kiện mới</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Giá</th>
                <th>Kho</th>
                <th>Danh mục</th>
                <th>Ảnh</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($accessories as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>${{ number_format($item->price) }}</td>
                    <td>{{ $item->stock }}</td>
                    <td>{{ $item->category }}</td>
                    <td><img src="{{ $item->image_url }}" alt="{{ $item->name }}" width="60"></td>
                    <td>
                        <a href="{{ route('admin.accessories.edit', $item->id) }}" class="btn btn-primary btn-sm">Sửa</a>
                        <form action="{{ route('admin.accessories.destroy', $item->id) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Xác nhận xoá?')">Xoá</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
