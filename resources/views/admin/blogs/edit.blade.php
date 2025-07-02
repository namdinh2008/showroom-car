@extends('admin.layouts.app')

@section('title', 'Cập nhật bài viết')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Cập nhật bài viết</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Tiêu đề --}}
            <div class="form-group">
                <label for="title">Tiêu đề</label>
                <input type="text" name="title" id="title" value="{{ old('title', $blog->title) }}" class="form-control" required>
            </div>

            {{-- Nội dung --}}
            <div class="form-group">
                <label for="content">Nội dung</label>
                <textarea name="content" id="content" rows="6" class="form-control" required>{{ old('content', $blog->content) }}</textarea>
            </div>

            {{-- Ảnh đại diện hiện tại --}}
            @if ($blog->image_path)
                <div class="form-group">
                    <label>Ảnh hiện tại</label><br>
                    <img src="{{ asset('storage/' . $blog->image_path) }}" alt="Ảnh hiện tại" class="img-thumbnail" style="max-height: 150px">
                </div>
            @endif

            {{-- Ảnh mới (upload) --}}
            <div class="form-group">
                <label for="image_path">Tải ảnh mới</label>
                <input type="file" name="image_path" id="image_path" class="form-control-file">
            </div>

            {{-- Trạng thái --}}
            <div class="form-group">
                <div class="form-check">
                    <input type="checkbox" name="is_published" id="is_published" class="form-check-input" value="1" {{ $blog->is_published ? 'checked' : '' }}>
                    <label for="is_published" class="form-check-label">Công khai bài viết</label>
                </div>
            </div>

            {{-- Nút lưu --}}
            <div class="text-right">
                <button type="submit" class="btn btn-primary">
                    Cập nhật
                </button>
            </div>
        </form>
    </div>
</div>
@endsection