@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Danh sách phụ kiện</h1>
    <div class="row">
        @foreach($accessories as $item)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ $item->image_url }}" class="card-img-top" alt="{{ $item->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <p class="card-text">{{ $item->description }}</p>
                        <p class="card-text"><strong>Giá:</strong> ${{ number_format($item->price) }}</p>
                        <a href="{{ route('accessories.show', $item->id) }}" class="btn btn-primary">Xem chi tiết</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
