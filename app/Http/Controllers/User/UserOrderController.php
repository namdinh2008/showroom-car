<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\CarVariant;

class UserOrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'fullName' => 'required|string|max:255',
            'phone' => 'required|phone|max:20',
            'email' => 'required|email|max:255',
            'variant' => 'required|exists:car_variants,id',
            'color' => 'required|exists:car_variant_colors,id',
            'additionalNotes' => 'nullable|string|max:1000',
        ]);

        $variant = CarVariant::with('product')->findOrFail($request->variant);

        $order = Order::create([
            'name' => $request->fullName,
            'phone' => $request->phone,
            'email' => $request->email,
            'note' => $request->additionalNotes,
            'total_price' => $variant->product->price ?? 0,
            'status' => 'pending',
        ]);

        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $variant->product->id,
            'variant_id' => $variant->id,
            'color_id' => $request->color,
            'quantity' => 1,
            'price' => $variant->product->price ?? 0,
        ]);

        return redirect()->back()->with('success', 'Đặt hàng thành công!');
    }
}