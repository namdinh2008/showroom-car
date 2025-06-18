<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $userId = auth()->id() ?? 2; // demo: user id=2
        $cartItems = CartItem::where('user_id', $userId)->with('accessory')->get();
        $total = $cartItems->sum(function($item) {
            return $item->accessory->price * $item->quantity;
        });
        return view('checkout.index', compact('cartItems', 'total'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required',
        ]);
        // Demo: chỉ hiển thị lại thông tin, chưa lưu DB
        return view('checkout.confirm', compact('data'));
    }
}
