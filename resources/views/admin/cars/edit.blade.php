@extends('admin.layouts.app')

@section('title', 'Cập nhật hãng xe')

@section('content')
<div class="card shadow mb-4 max-w-3xl mx-auto">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Cập nhật hãng xe</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.cars.update', $car) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Tên hãng xe</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $car->name) }}" required>
            </div>

            <div class="form-group">
                <label for="logo_path">Logo (ảnh)</label>
                <input type="file" name="logo_path" id="logo_path" class="form-control-file" onchange="previewLogo(event)">

                {{-- Hiển thị logo hiện tại --}}
                @if($car->logo_path)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $car->logo_path) }}" alt="Logo hiện tại" width="100" class="img-thumbnail">
                    </div>
                @endif

                {{-- Preview ảnh mới nếu có chọn --}}
                <div class="mt-2">
                    <img id="logoPreview" src="#" alt="Preview ảnh mới" style="display:none; max-height: 100px;" class="img-thumbnail">
                </div>
            </div>

            <div class="form-group">
                <label for="country">Quốc gia</label>
                <input type="text" name="country" id="country" class="form-control" value="{{ old('country', $car->country) }}">
            </div>

            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea name="description" id="description" rows="4" class="form-control">{{ old('description', $car->description) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
</div>

{{-- Script preview ảnh mới --}}
<script>
    function previewLogo(event) {
        const input = event.target;
        const preview = document.getElementById('logoPreview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = e => {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection