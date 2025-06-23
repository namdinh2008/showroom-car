<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    public function index(Request $request)
    {
        $query = CartItem::with(['user', 'product']);

        if ($request->has('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        $cartItems = $query->paginate(10);
        return view('admin.cart_items.index', compact('cartItems'));
    }

    public function create()
    {
        $users = User::all();
        $products = Product::all();
        return view('admin.cart_items.create', compact('users', 'products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'session_id' => 'required|string',
            'user_id' => 'nullable|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'color_id' => 'nullable|exists:car_variant_colors,id',
            'quantity' => 'required|integer|min:1',
        ]);

        CartItem::create($validated);
        return redirect('/admin/cart-items')->with('success', 'Thêm giỏ hàng thành công!');
    }

    public function edit($id)
    {
        $cartItem = CartItem::findOrFail($id);
        $users = User::all();
        $products = Product::all();
        return view('admin.cart_items.edit', compact('cartItem', 'users', 'products'));
    }

    public function update(Request $request, $id)
    {
        $cartItem = CartItem::findOrFail($id);

        $validated = $request->validate([
            'session_id' => 'required|string',
            'user_id' => 'nullable|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'color_id' => 'nullable|exists:car_variant_colors,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem->update($validated);
        return redirect('/admin/cart-items')->with('success', 'Cập nhật giỏ hàng thành công!');
    }

    public function destroy($id)
    {
        CartItem::findOrFail($id)->delete();
        return redirect('/admin/cart-items')->with('success', 'Đã xóa mục giỏ hàng!');
    }
}