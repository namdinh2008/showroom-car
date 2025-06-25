<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::with('user');

        if ($request->has('status') && $request->status !== '') {
            $query->where('status', $request->status);
        }

        if ($request->has('search') && $request->search !== '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $orders = $query->orderByDesc('created_at')->paginate(10);

        return view('admin.orders.index', [
            'orders' => $orders,
            'search' => $request->search,
            'status' => $request->status,
        ]);
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

        $request->merge([
            'name' => $order->name,
            'email' => $order->email,
            'phone' => $order->phone,
            'address' => $order->address,
            'payment_method' => $order->payment_method,
        ]);

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