<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;

class CartController extends Controller
{
    public function index()
    {
        $userId = \Illuminate\Support\Facades\Auth::check() ? \Illuminate\Support\Facades\Auth::user()->id : null;
        $sessionId = session()->getId();

        $cartItems = CartItem::where(function ($q) use ($userId, $sessionId) {
            if ($userId) $q->where('user_id', $userId);
            else $q->where('session_id', $sessionId);
        })->with(['product', 'color'])->get();

        return view('cart.index', compact('cartItems'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'color_id' => 'nullable|exists:car_variant_colors,id',
            'quantity' => 'required|integer|min:1'
        ]);
        $userId = Auth::check() ? Auth::user()->id : null;
        $sessionId = session()->getId();

        $cartItem = CartItem::where([
            'product_id' => $request->product_id,
            'color_id' => $request->color_id,
            'user_id' => $userId,
            'session_id' => $sessionId,
        ])->first();

        if ($cartItem) {
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            CartItem::create([
                'product_id' => $request->product_id,
                'color_id' => $request->color_id,
                'quantity' => $request->quantity,
                'user_id' => $userId,
                'session_id' => $sessionId,
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Đã thêm vào giỏ hàng!');
    }

    public function update(Request $request, CartItem $cartItem)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);
        $cartItem->update(['quantity' => $request->quantity]);
        return back()->with('success', 'Cập nhật số lượng thành công!');
    }

    public function remove(CartItem $cartItem)
    {
        $cartItem->delete();
        return back()->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng!');
    }


    public function showCheckoutForm(Request $request)
    {
        $user = Auth::user();
        $userId = $user ? $user->id : null;
        $sessionId = session()->getId();

        $cartItems = CartItem::where(function ($q) use ($userId, $sessionId) {
            if ($userId) $q->where('user_id', $userId);
            else $q->where('session_id', $sessionId);
        })->with(['product', 'color'])->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng trống!');
        }

        $total = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);

        return view('cart.checkout', compact('cartItems', 'total', 'user'));
    }

    public function processCheckout(Request $request)
    {
        $user = Auth::user();
        $userId = $user ? $user->id : null;
        $sessionId = session()->getId();

        $cartItems = CartItem::where(function ($q) use ($userId, $sessionId) {
            if ($userId) $q->where('user_id', $userId);
            else $q->where('session_id', $sessionId);
        })->with(['product', 'color'])->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng trống!');
        }

        $validated = $request->validate([
            'phone' => 'required|string',
            'name' => 'required|string',
            'email' => 'nullable|email',
            'address' => 'required|string',
            'note' => 'nullable|string',
            'payment_method' => 'required|in:cod,bank_transfer,vnpay,momo',
        ]);

        $total = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);

        $order = Order::create([
            'user_id' => $userId,
            'phone' => $validated['phone'],
            'name' => $validated['name'],
            'email' => $validated['email'] ?? null,
            'address' => $validated['address'],
            'total_price' => $total,
            'note' => $validated['note'] ?? null,
            'payment_method' => $validated['payment_method'],
            'status' => 'pending',
        ]);

        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'color_id' => $item->color_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ]);
        }

        // Xóa giỏ hàng
        CartItem::where(function ($q) use ($userId, $sessionId) {
            if ($userId) $q->where('user_id', $userId);
            else $q->where('session_id', $sessionId);
        })->delete();

        return redirect()->route('cart.index')->with('success', 'Đặt hàng thành công!');
    }
}
