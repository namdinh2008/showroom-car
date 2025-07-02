<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderLog;

class OrderLogController extends Controller
{
    public function index(Order $order)
    {
        $logs = OrderLog::where('order_id', $order->id)->with('user')->orderByDesc('created_at')->get();
        return view('admin.orderlogs.logs', compact('order', 'logs'));
    }
}