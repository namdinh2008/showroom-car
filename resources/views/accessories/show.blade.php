@extends('layouts.app')
@section('content')
<div class="container">
    <h1>{{ $accessory->name }}</h1>
    <img src="{{ $accessory->image_url }}" alt="{{ $accessory->name }}" class="img-fluid mb-3" style="max-width:400px;">
    <p>{{ $accessory->description }}</p>
    <p><strong>Giá:</strong> ${{ number_format($accessory->price) }}</p>
    <p><strong>Kho:</strong> {{ $accessory->stock }}</p>
    <p><strong>Danh mục:</strong> {{ $accessory->category }}</p>
    <a href="{{ url('/accessories') }}" class="btn btn-secondary">Quay lại danh sách</a>
</div>
@endsection
