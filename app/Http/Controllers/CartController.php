<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Accessory;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Hiển thị giỏ hàng (demo: lấy tất cả cart item của user id=2)
    public function index()
    {
        $userId = auth()->id() ?? 2; // demo: user id=2
        $cartItems = CartItem::where('user_id', $userId)->with('accessory')->get();
        $total = $cartItems->sum(function($item) {
            return $item->accessory->price * $item->quantity;
        });
        return view('cart.index', compact('cartItems', 'total'));
    }

    // Xoá sản phẩm khỏi giỏ
    public function destroy($id)
    {
        CartItem::destroy($id);
        return redirect()->route('cart.index');
    }
}
