@extends('layouts.admin')

@section('title', 'Edit Car Order')

@section('content')
<div class="bg-white p-6 rounded shadow max-w-3xl mx-auto">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">✏️ EDIT CAR ORDER</h1>
    <form action="{{ route('admin.carorders.update', ['carorder' => $carorder->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-sm font-semibold text-gray-700 mb-1">User</label>
            <input type="text" disabled value="{{ $carorder->user->name }}"
                   class="w-full bg-gray-100 border-gray-300 rounded px-4 py-2">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-semibold text-gray-700 mb-1">Car Model</label>
            <input type="text" disabled value="{{ $carorder->carModel->name }}"
                   class="w-full bg-gray-100 border-gray-300 rounded px-4 py-2">
        </div>

        <div class="mb-4">
            <label for="total_price" class="block text-sm font-semibold text-gray-700 mb-1">Total Price</label>
            <input type="number" name="total_price" id="total_price" step="0.01" value="{{ old('total_price', $carorder->total_price) }}"
                   class="w-full border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:ring-indigo-200">
        </div>

        <div class="mb-4">
            <label for="status" class="block text-sm font-semibold text-gray-700 mb-1">Status</label>
            <select name="status" id="status" required
                    class="w-full border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:ring-indigo-200">
                <option value="pending" {{ $carorder->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="confirmed" {{ $carorder->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                <option value="canceled" {{ $carorder->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
            </select>
        </div>

        <div class="text-right">
            <button type="submit"
                    class="inline-flex items-center gap-2 px-6 py-2 bg-indigo-600 font-semibold rounded-md shadow hover:bg-indigo-700 transition">
                Update Order
            </button>
        </div>
    </form>
</div>
@endsection