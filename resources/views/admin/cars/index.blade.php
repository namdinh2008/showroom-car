@extends('admin.layouts.app')

@section('title', 'Danh sách hãng xe')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách hãng xe</h6>
            <a href="{{ route('admin.cars.create') }}" class="btn btn-sm btn-success">
                <i class="fas fa-plus"></i> Thêm mới
            </a>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('admin.cars.index') }}" class="form-inline mb-3">
                <input type="text" name="search" value="{{ request('search') }}" class="form-control mr-2"
                    placeholder="Tìm kiếm...">
                <button type="submit" class="btn btn-primary">Tìm</button>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>Tên hãng</th>
                            <th>Logo</th>
                            <th>Quốc gia</th>
                            <th class="text-center">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($cars as $car)
                            <tr>
                                <td>{{ $car->id }}</td>
                                <td>{{ $car->name }}</td>
                                <td>
                                    @if ($car->logo_path)
                                        <img src="{{ asset('storage/' . $car->logo_path) }}" alt="Logo" class="img-thumbnail"
                                            style="height: 60px;">
                                    @else
                                        <span class="text-muted">Không có</span>
                                    @endif
                                </td>
                                <td>{{ $car->country }}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin.cars.edit', $car) }}" class="btn btn-sm btn-info">Sửa</a>
                                    <form action="{{ route('admin.cars.destroy', $car) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Bạn có chắc muốn xoá?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Xoá</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">Không có dữ liệu.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-3">{{ $cars->appends(request()->query())->links() }}</div>
        </div>
    </div>
@endsection