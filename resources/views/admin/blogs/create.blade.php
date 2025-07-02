@extends('admin.layouts.app')

@section('title', 'Thêm bài viết mới')

@section('content')
<div class="card shadow mb-4 max-w-3xl mx-auto">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Thêm bài viết mới</h6>
    </div>

    <div class="card-body">
        {{-- Hiển thị lỗi --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0 pl-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Tiêu đề --}}
            <div class="form-group">
                <label for="title">Tiêu đề bài viết</label>
                <input type="text" name="title" id="title" class="form-control"
                       value="{{ old('title') }}" required>
            </div>

            {{-- Ảnh upload --}}
            <div class="form-group">
                <label for="image_path">Hình ảnh</label>
                <input type="file" name="image_path" id="image_path" class="form-control-file" accept="image/*" onchange="previewImage(event)">
                <div class="mt-2">
                    <img id="imagePreview" src="#" alt="Preview ảnh" style="display: none; max-height: 120px;" class="img-thumbnail">
                </div>
            </div>

            {{-- Nội dung --}}
            <div class="form-group">
                <label for="content">Nội dung</label>
                <textarea name="content" id="content" rows="6" class="form-control" required>{{ old('content') }}</textarea>
            </div>

            {{-- Trạng thái --}}
            <div class="form-check mb-3">
                <input type="checkbox" name="is_published" id="is_published" class="form-check-input" {{ old('is_published') ? 'checked' : '' }}>
                <label for="is_published" class="form-check-label">Công khai ngay</label>
            </div>

            {{-- Nút lưu --}}
            <button type="submit" class="btn btn-primary">Lưu bài viết</button>
        </form>
    </div>
</div>

{{-- JS preview ảnh --}}
<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('imagePreview');

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