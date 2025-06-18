@extends('layouts.app')

@section('content')
    {{-- Hero section cho từng mẫu xe từ seed data --}}
    @php $models = \App\Models\CarModel::where('is_active', 1)->get(); @endphp
    @foreach($models as $car)
        @include('components.hero', [
            'title' => $car->name,
            'subtitle' => 'Giá từ $' . number_format($car->base_price),
            'image' => $car->image_url,
            'whiteText' => true,
            'link' => route('cars.show', $car->id)
        ])
    @endforeach
@endsection
