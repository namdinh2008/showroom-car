<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::with('user');

        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        $orders = $query->orderByDesc('created_at')->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with(['user', 'items.product'])->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    public function edit($id)
    {
        $order = Order::with('items.product')->findOrFail($id);
        $users = User::all();
        $statuses = ['pending', 'confirmed', 'shipping', 'delivered', 'cancelled'];
        return view('admin.orders.edit', compact('order', 'users', 'statuses'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $validated = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'phone' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'note' => 'nullable|string',
            'status' => 'required|in:pending,confirmed,shipping,delivered,cancelled',
            'payment_method' => 'required|in:cod,bank_transfer,vnpay,momo',
        ]);

        $order->update($validated);

        return redirect('/admin/orders')->with('success', 'Cập nhật đơn hàng thành công!');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->items()->delete();
        $order->delete();

        return redirect('/admin/orders')->with('success', 'Đã xóa đơn hàng!');
    }
}