@extends('admin.layouts.app')

@section('title', 'Thêm hãng xe mới')

@section('content')
<div class="card shadow mb-4 max-w-3xl mx-auto">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Thêm hãng xe mới</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.cars.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Tên hãng xe</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="logo_path">Logo (ảnh)</label>
                <input type="file" name="logo_path" id="logo_path" class="form-control-file" onchange="previewLogo(event)">
                {{-- Thêm phần preview ảnh --}}
                <div class="mt-2">
                    <img id="logoPreview" src="#" alt="Preview" style="display:none; max-height: 100px;" class="img-thumbnail">
                </div>
            </div>

            <div class="form-group">
                <label for="country">Quốc gia</label>
                <input type="text" name="country" id="country" class="form-control" value="{{ old('country') }}">
            </div>

            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea name="description" id="description" rows="4" class="form-control">{{ old('description') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Lưu hãng xe</button>
        </form>
    </div>
</div>

{{-- Script preview ảnh --}}
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