<?php

namespace App\Http\Controllers;

use App\Models\Accessory;
use Illuminate\Http\Request;

class AccessoryController extends Controller
{
    // Hiển thị danh sách phụ kiện
    public function index()
    {
        $accessories = Accessory::all();
        return view('accessories.index', compact('accessories'));
    }

    // Hiển thị chi tiết 1 phụ kiện
    public function show($id)
    {
        $accessory = Accessory::findOrFail($id);
        return view('accessories.show', compact('accessory'));
    }
}
