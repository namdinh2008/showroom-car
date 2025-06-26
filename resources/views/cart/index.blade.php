@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-10 pt-28">
    <h2 class="text-3xl md:text-4xl font-extrabold mb-8 text-center text-gray-900 tracking-tight">🛒 Giỏ hàng của bạn</h2>
    @if(session('success'))
        <div class="mb-6 px-4 py-3 rounded bg-green-100 text-green-800 text-center font-semibold shadow">{{ session('success') }}</div>
    @endif
    @if($cartItems->isEmpty())
        <div class="text-center text-gray-500 text-lg py-20">
            <i class="fas fa-shopping-cart text-5xl mb-4"></i>
            <div>Giỏ hàng trống.</div>
            <a href="{{ route('home') }}" class="inline-block mt-6 px-6 py-3 bg-indigo-600 text-white rounded hover:bg-indigo-700 font-bold shadow transition">Tiếp tục mua sắm</a>
        </div>
    @else
        <div class="overflow-x-auto rounded shadow mb-8">
            <table class="w-full bg-white rounded-lg overflow-hidden">
                <thead class="bg-gray-100 text-gray-700 uppercase text-sm">
                    <tr>
                        <th class="py-3 px-4 text-left">Sản phẩm</th>
                        <th class="py-3 px-4 text-left">Màu</th>
                        <th class="py-3 px-4 text-right">Giá</th>
                        <th class="py-3 px-4 text-center">Số lượng</th>
                        <th class="py-3 px-4 text-right">Thành tiền</th>
                        <th class="py-3 px-4"></th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach($cartItems as $item)
                        @php $total += $item->product->price * $item->quantity; @endphp
                        <tr class="border-b hover:bg-gray-50 transition">
                            <td class="py-3 px-4 font-semibold text-gray-900">
                                {{ $item->product->name }}
                            </td>
                            <td class="py-3 px-4 text-gray-700">
                                {{ $item->color?->color_name ?? '-' }}
                            </td>
                            <td class="py-3 px-4 text-right text-indigo-700 font-bold">
                                {{ number_format($item->product->price) }} đ
                            </td>
                            <td class="py-3 px-4 text-center">
                                <form action="{{ route('cart.update', $item->id) }}" method="POST" class="inline-flex items-center gap-2">
                                    @csrf
                                    <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="w-16 border rounded px-2 py-1 text-center focus:ring focus:border-indigo-400 transition">
                                    <button type="submit" class="text-blue-600 hover:underline font-semibold">Cập nhật</button>
                                </form>
                            </td>
                            <td class="py-3 px-4 text-right font-semibold text-gray-900">
                                {{ number_format($item->product->price * $item->quantity) }} đ
                            </td>
                            <td class="py-3 px-4 text-center">
                                <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 font-semibold hover:underline transition">
                                        Xóa
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="flex flex-col md:flex-row items-center justify-between mb-8">
            <div></div>
            <div class="text-right font-bold text-2xl text-indigo-700">
                Tổng cộng: {{ number_format($total) }} đ
            </div>
        </div>
        <div class="text-right">
            <form action="{{ route('cart.checkout.form') }}" method="GET" class="inline-block">
                <button type="submit" class="bg-green-600 text-white px-8 py-3 rounded-lg hover:bg-green-700 font-bold shadow-lg transition text-lg">
                    <i class="fas fa-credit-card mr-2"></i>Thanh toán
                </button>
            </form>
        </div>
    @endif
</div>
@endsection