@extends('layouts.admin')

@section('title', 'Car Orders')

@section('content')
<div class="bg-white p-6 rounded shadow mx-6 my-6">
    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
            📝 CAR ORDERS
        </h1>
        <a href="{{ route('admin.carorders.create') }}">
            <button type="button"
                class="inline-flex items-center gap-2 px-5 py-2 bg-indigo-600 font-semibold rounded-md shadow hover:bg-indigo-700 transition">
                ➕ Create Order
            </button>
        </a>
    </div>

    {{-- Table --}}
    <div class="overflow-x-auto">
        <table class="min-w-full w-full border border-gray-200 text-sm text-left rounded-md shadow-sm">
            <thead class="bg-gray-100 text-gray-700 uppercase text-sm">
                <tr>
                    <th class="px-4 py-3 border-b">#</th>
                    <th class="px-4 py-3 border-b">Customer</th>
                    <th class="px-4 py-3 border-b">Car Model</th>
                    <th class="px-4 py-3 border-b text-right">Total Price</th>
                    <th class="px-4 py-3 border-b text-center">Status</th>
                    <th class="px-4 py-3 border-b text-center w-60">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-800">
                @forelse ($carOrders as $order)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-3 align-middle">{{ $order->id }}</td>
                        <td class="px-4 py-3 align-middle">{{ $order->user->name }}</td>
                        <td class="px-4 py-3 align-middle">{{ $order->carModel->name }}</td>
                        <td class="px-4 py-3 text-right align-middle">${{ number_format($order->total_price, 0, '.', ',') }}</td>
                        <td class="px-4 py-3 text-center align-middle">
                            @if ($order->status === 'pending')
                                <span class="inline-block px-2 py-1 text-xs font-semibold bg-yellow-100 text-yellow-700 rounded">Pending</span>
                            @elseif ($order->status === 'confirmed')
                                <span class="inline-block px-2 py-1 text-xs font-semibold bg-green-100 text-green-700 rounded">Confirmed</span>
                            @else
                                <span class="inline-block px-2 py-1 text-xs font-semibold bg-red-100 text-red-700 rounded">Canceled</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-center align-middle">
                            <div class="flex justify-center gap-3">
                                <a href="{{ route('admin.carorders.edit', $order) }}">
                                    <button type="button"
                                        class="px-4 py-1 text-sm font-medium bg-blue-500 text-white rounded-md hover:bg-blue-600 transition shadow">
                                        Edit
                                    </button>
                                </a>

                                <form action="{{ route('admin.carorders.destroy', $order) }}" method="POST"
                                      onsubmit="return confirm('Are you sure you want to delete this order?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-4 py-1 text-sm font-medium bg-red-500 text-white rounded-md hover:bg-red-600 transition shadow">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-4 text-center text-gray-500">No car orders found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection